<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\SocialAccount;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect('login');
    }

    public function redirectToProvider($provider)
    {
      if (in_array($provider, ['google', 'facebook', 'twitter'])){
          return Socialite::driver($provider)->redirect();
      }

      return redirect()->to('login');
    }

    public function responseProviderCallback($provider)
    {
        try {
          $socialite = Socialite::driver($provider)->user();

          $user = $this->firstOrCreate($socialite, $provider);

          Auth::login($user, true);
        } catch (Exception $error) {
          Flash::error('Something wrong! ' . $error->getMessage().', '.$error->getLine());

          return redirect()->to('login');
        }

        return redirect()->to('dashboard');
    }

    private function firstOrCreate($socialite, $provider)
    {
      $socialAccount = SocialAccount::getExistSocial($socialite->getId(), $provider);

      if ($socialAccount) {
          return User::find($socialAccount->first()->user_id);
      }

      $user = User::getExistUser($socialite->getEmail());

      if (!$user) {
          $user = User::create([
              'username' => explode('@', $socialite->getEmail())[0],
              'email' => $socialite->getEmail(),
          ]);

          // Spatie [Assign a Role Permission to a New User]
          $user->assignRole(['student']);

          Biodata::create([
              'user_id' => $user->id,
              'fullname' => $socialite->getName()
          ]);
      }

      SocialAccount::create([
          'provider_id' => $socialite->getId(),
          'provider_name' => $provider,
          'user_id' => $user->id
      ]);

      return $user;
    }
}
