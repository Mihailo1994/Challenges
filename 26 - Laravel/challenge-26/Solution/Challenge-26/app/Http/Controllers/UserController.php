<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $data){
        $validate = $data->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        User::create([
            'username' => $data->username,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'role_id' => DB::table('roles')->where('type', 'guest')->first()->id,
        ]);

        if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
            return redirect('/')->with('status', 'You have successfully registered');
        }

    }

    public function login(Request $data){
        $validate = $data->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
            return redirect('/')->with('status', 'You have successfully logged');
        } else {
            return back()->withErrors(['error' => 'The provided credentials do not match our records.']);
        }
    }

    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
