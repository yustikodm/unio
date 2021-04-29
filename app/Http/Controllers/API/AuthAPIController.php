<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AuthResource;
use App\Repositories\UserRepository;
use App\User;
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

    Auth::login($user);

    return $this->sendResponse(new UserResource($user), 'Account registered successfully');
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

    $this->userRepository->update($user->id, ['api_token' => Str::random(100)]);
    
    Auth::login($user);
    
    $user = $this->userRepository->find(auth()->id());
    
    return $this->sendResponse(new UserResource($user), 'Logged in successfully');
  }
  
  public function logout()
  {
      // return $this->userRepository->find(auth()->id());
      $this->userRepository->update(auth()->id(), ['api_token' => null]);

      return $this->sendSuccess('Logged out successfully');
  }
}
