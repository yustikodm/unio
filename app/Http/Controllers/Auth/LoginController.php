<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
        Socialite::driver($provider)->redirect();
      }

      return redirect()->to('login');
    }

    public function responseProviderCallback($provider)
    {
      try {
        $user = Socialite::driver($provider)->user();

        $this->firstOrCreate($user, $provider);
        // SocialAccount::where('provider_id', $)
      } catch (Exception $error) {
        Flash::error('Something wrong! ' . $error->getMessage());

        return redirect()->to('login');
      }

      return redirect()->route('home');
    }

    private function firstOrCreate($socialUser, $provider)
    {
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
                            ->where('provider_name', $provider)
                            ->first();

        if ($socialAccount) {
          return $socialAccount->user;
        } else {
          $user = User::where('email', $socialUser->getEmail()->first());
        }
    }
}
