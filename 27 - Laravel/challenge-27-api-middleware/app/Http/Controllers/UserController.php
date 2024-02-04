<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm() {
        return view('login');
    }

    public function login(Request $data){
        $validate = $data->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $data->email, 'password' => $data->password])){
            return redirect('/');
        }
    }

    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function createToken(){
        $id = Auth::id();
        $user = User::find($id);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response($token);
    }
}
