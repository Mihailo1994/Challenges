<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUser;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function register(RegisterUser $data) {
        $validated = $data->validated();

        $user = new User();
        $user->username = $data->username;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->created_at = Carbon::now();
        $user->updated_at = null;

        $user->save();

        if (Auth::attempt(['username' => $data->username, 'password' => $data->password])) {

            return redirect('/')->with('status', 'You have successfully registered');

        }


    }

    public function login(LoginUser $data) {

        $validated = $data->validated();

        $remember = null;
        if ($data->remember != NULL) {
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::attempt(['username' => $data->username, 'password' => $data->password], $remember)) {
            return redirect('/')->with('status', 'You have successfully logged');
        } else {
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ]);
        }
    }


    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
