<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\User;

class VerificationAPIController extends AppBaseController
{      

    public function verify($user_id, Request $request) {        

        $user = User::find($user_id);
        if(empty($user)){
            return response()->json(["message" => "User Not Found.", "success" => false]);
        }
        if(!empty($user->email_verified_at)){
            return response()->json(["message" => "Email already verified.", "success" => false]);
        }
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return response()->json(["message" => "Email successfully verified.", "success" => true]);
    }

    public function resend(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        if(empty($user)){
            return response()->json(["message" => "User Not Found.", "success" => false]);
        }
        if(!empty($user->email_verified_at)){
            return response()->json(["message" => "Email already verified.", "success" => false]);
        }

        $user->sendEmailVerificationNotification();

        return response()->json(["message" => "Email verification link sent on your email", "success" => true]);
    }
}
