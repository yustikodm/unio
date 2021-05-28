<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Repositories\UserRepository;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;
use App\Http\Resources\AuthResource;
use Illuminate\Support\Str;

class VerificationAPIController extends AppBaseController
{      
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
      $this->userRepository = $userRepo;
    }

    public function verify($user_id, Request $request) {        
        $user = User::find($user_id);
        if(empty($user)){
            return response()->json([
                "message" => "User Not Found.", 
                "submessage" => "Please sign up if you don't have an account",
                "type" => 1,
                "success" => false
            ]);
        }
        if ($request->input("request") !== "UNIO".$user->password."UNIO") {
          return response()->json([
            'message' => 'Invalid request.',
            "submessage" => "Please send request a verification email again if it is not verified.",
            "type" => 3,
            'success' => false
          ]);
        }
        if(!empty($user->email_verified_at)){
            return response()->json([
                "message" => "Email already verified.", 
                "submessage" => "You can sign in, via the unio website or application on your device.",
                "type" => 2,
                "success" => false
            ]);
        }
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }
        
        $this->userRepository->loginApi($user->id);
        
        Auth::login($user);
        
        $user = $this->userRepository->find($user->id);    

        $pictureUser = Biodata::where('user_id', $user->id)->where('picture', null)->first();    
        if(!empty($pictureUser)){
          Biodata::where('user_id', $user->id)->update(['picture' => $user->image_path]);
        }

        $user->biodata = Biodata::where('user_id', $user->id)->first();

        return response()->json([
            "message" => "Email successfully verified.", 
            "submessage" => "You can sign in, via the unio website or application on your device.",
            "type" => 2,
            "data" => new UserResource($user),
            "success" => true
        ]);
    }

    public function resend(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        if(empty($user)){
            return response()->json([
                "message" => "User Not Found.", 
                "submessage" => "Please sign up if you don't have an account",
                "type" => 1,
                "success" => false
            ]);
        }

        if(!empty($user->email_verified_at)){
            return response()->json([
                "message" => "Email already verified.", 
                "submessage" => "You can sign in, via the unio website or application on your device.",
                "type" => 2,
                "success" => false
            ]);
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            "message" => "Success", 
            "submessage" => "Email verification link sent on your email",
            "type" => 0,
            "success" => true
        ]);
    }

    public function forgotPassword(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        if(empty($user)){
            return response()->json([
                "message" => "User Not Found.", 
                "submessage" => "Please sign up if you don't have an account",
                "type" => 1,
                "success" => false
            ]);
        }

        Password::sendResetLink($request->only('email'));

        // $user->sendEmailVerificationNotification();

        return response()->json([
            "message" => "Success", 
            "submessage" => "successfully sent a message link for resetting your password to your email",
            "type" => 0,
            "success" => true
        ]);
    }

    public function verifyForgotPassword($id, Request $request) {
        $user = User::find($id);
        if(empty($user)){
            return response()->json([
                "message" => "User Not Found.", 
                "submessage" => "Please sign up if you don't have an account",
                "type" => 1,
                "success" => false
            ]);
        }
        if ($request->input("request") !== "UNIO".$user->password."UNIO") {
          return response()->json([
            'message' => 'Invalid request.',
            "submessage" => "This request is no longer valid, please try again to request again.",
            "type" => 3,
            'success' => false
          ]);
        }        

        return response()->json([
            "message" => "Request is Verified.", 
            "submessage" => "Now you can set new password, for your account.",
            "type" => 0,
            "success" => true
        ]);
    }

    public function resetPassword(Request $request){
        // return $request;
        $user = User::find($request->input('id'));
        if(empty($user)){
            return response()->json([
                "message" => "User Not Found.", 
                "submessage" => "Please sign up if you don't have an account",
                "type" => 1,
                "success" => false
            ]);
        }
        if ($request->input("request") !== "UNIO".$user->password."UNIO") {
          return response()->json([
            'message' => 'Invalid request.',
            "submessage" => "This request is no longer valid, please try again to request again.",
            "type" => 3,
            'success' => false
          ]);
        } 

        $user->update(['password' => Hash::make($request->input('password')) ]);    

        $this->userRepository->loginApi($user->id);
        
        Auth::login($user);
        
        $user = $this->userRepository->find($user->id);    

        $pictureUser = Biodata::where('user_id', $user->id)->where('picture', null)->first();    
        if(!empty($pictureUser)){
          Biodata::where('user_id', $user->id)->update(['picture' => $user->image_path]);
        }

        $user->biodata = Biodata::where('user_id', $user->id)->first();

        return response()->json([
            "message" => "Your password successfully to reset.", 
            "submessage" => "Now you can sign in with your account.",
            "type" => 2,
            "data" => new UserResource($user),
            "success" => true
        ]);
    }

    public function authOther($id, Request $request){        
        $user = User::find($id);

        if (!$user) {
          return response()->json([
            'message' => 'User not found!',
            'success' => false,
          ]);
        }


        if (Hash::make($user->email) == $request->input('request')) {
          return response()->json([
            'message' => 'Request is Invalid',
            "submessage" => '-',
            "type" => 0,
            'success' => false,
          ]);
        }

        $this->userRepository->loginApi($user->id);
        
        Auth::login($user);
        
        $user = $this->userRepository->find($user->id);

        $user->biodata = Biodata::where('user_id', $user->id)->first();
        
        return $this->sendResponse(new UserResource($user), 'Logged with social media in successfully');
    }

}
