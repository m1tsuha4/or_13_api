<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;

class EmailVerificationController extends Controller
{

    public function sendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Already Verified'
            ];
        }

        $request->user()->sendEmailVerificationNotification();

        return ['status' => 'verification-link-sent'];
    }

//    public function verify(EmailVerificationRequest $request)
//    {
//        if ($request->user()->hasVerifiedEmail()) {
//            return [
//                'message' => 'Email already verified'
//            ];
//        }
//
//        if ($request->user()->markEmailAsVerified()) {
//            event(new Verified($request->user()));
//        }
//
//        return [
//            'message'=>'Email has been verified'
//        ];
//    }
    public function verify($id,Request $request)
    {
        $user = User::find($id);
//        if ($user->hasVerifiedEmail()) {
//            return [
//                'message' => 'Email already verified'
//            ];
//        }
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            return [
                'message' => 'Email has been verified'
            ];
        }

//        if ($user()->markEmailAsVerified()) {
//            event(new Verified($request->user()));
//        }
//
//        return [
//            'message'=>'Email has been verified'
//        ];
    }
}
