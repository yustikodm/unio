<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\User;

class VerificationAPIController extends AppBaseController
{      

    public function verify($user_id, Request $request) {

        // return ["user_id" => $user_id, "request" => $request->input('request')]; 

        $user = User::find($user_id);
        if(empty($user)){
            return response()->json(["message" => "User Not Found.", "success" => false]);
        }
        if(!empty($user->email_verified_at)){
            return response()->json(["message" => "Email .", "success" => false]);
        }
        // if (!$request->hasValidSignature()) {
        //     return response()->json(["message" => "Invalid/Expired url provided.", "success" => false]);
        // }


        // if (!$user->hasVerifiedEmail()) {
        //     $user->markEmailAsVerified();
        // }

        return response()->json(["message" => "Success.", "success" => true]);
    }

    // public function resend() {
    //     if (auth()->user()->hasVerifiedEmail()) {
    //         return response()->json(["message" => "Email already verified."], "success" => false);
    //     }

    //     auth()->user()->sendEmailVerificationNotification();

    //     return response()->json(["message" => "Email verification link sent on your email id", "success" => true]);
    // }
}
