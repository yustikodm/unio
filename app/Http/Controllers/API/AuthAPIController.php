<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AuthResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthAPIController extends AppBaseController
{

  public function register(Request $request)
  {
    $this->validate($request, [
      'name' => 'required:min:2',
      'email' => 'required|email|unique:users,email,id',
      'password' => 'required|min:4'
    ]);

    try {
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'api_token' => Str::random(100),
      ]);
    } catch (\Exception $error) {
      return response()->json([
        'success' => false,
        'message' => $error->getMessage()
      ]);
    }

    return $this->sendResponse(new AuthResource($user), 'Registered successfully');
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

    return $this->sendResponse(new AuthResource($user), 'Logged in successfully');
  }
}
