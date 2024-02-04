<?php

namespace App\Http\Controllers;

use App\Events\ActivateUser;
use App\Models\User;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function ValidateLink(Request $data, $email, $token){
            $user = User::where('email', $email)->where('token', $token)->first();
            if(!$user){
                abort(401);
            }
            if (!$data->hasValidSignature()) {
                $id = $user->id;
                return view('resend', compact('id'));
            } else {
                event(new ActivateUser($user));
                return view('activated');
            }
    }
}
