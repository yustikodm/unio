<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AuthResource;
use App\Repositories\UserRepository;
use App\User;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class AuthAPIController extends AppBaseController
{
  /** @var  UserRepository */
  private $userRepository;

  public function __construct(UserRepository $userRepo)
  {
    $this->userRepository = $userRepo;
  }

  public function register(Request $request)
  {
    $input = $request->only([
      'name', 
      'username', 
      'email', 
      'password', 
      'roles',
      'phone'
    ]);

    $input['api_token'] = Str::random(100);

    $user = $this->userRepository->store($input);

    // Auth::login($user);

    // return $this->sendResponse(new UserResource($user), 'Account registered successfully');
    return $this->sendResponse([], 'Account registered successfully, email verification has sended in your email addresss');
  }

  public function login(Request $request)
  {
    $this->validate($request, [
      'email' => 'required',
      'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
      return response()->json([
        'message' => 'User not found!',
        'success' => false,
      ]);
    }

    if (!Hash::check($request->password, $user->password)) {
      return response()->json([
        'message' => 'Wrong Password! Try again.',
        'success' => false,
      ]);
    }

    if (empty($user->email_verified_at)) {
      return response()->json([
        'message' => 'Unverified email, please verify it first!',
        'success' => false,
      ]);
    }

    $this->userRepository->loginApi($user->id);
    
    Auth::login($user);
    
    $user = $this->userRepository->find($user->id);    

    $pictureUser = Biodata::where('user_id', $user->id)->where('picture', null)->first();    
    if(!empty($pictureUser)){
      Biodata::where('user_id', $user->id)->update(['picture' => $user->image_path]);
    }

    $user->biodata = Biodata::where('user_id', $user->id)->first();
    
    return $this->sendResponse(new UserResource($user), 'Logged in successfully');
  }
  
  public function logout()
  {
      // return $this->userRepository->find(auth()->id());
      $this->userRepository->update(auth()->id(), ['api_token' => null]);
      // Auth::logout();
      return $this->sendSuccess('Sing out successfully');
  }
}
