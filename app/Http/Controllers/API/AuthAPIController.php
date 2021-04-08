<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AuthResource;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
      'roles'
    ]);

    $user = $this->userRepository->store($input);

    return $this->sendResponse(new AuthResource($user), 'Account registered successfully');
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

    $user = $this->userRepository->update($user->id, ['api_token' => Str::random(100)]);

    return $this->sendResponse(new AuthResource($user), 'Logged in successfully');
  }
}
