<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Events\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function getUsers(){
        $users = User::select('id', 'username', 'email', 'is_active')->where('type', 'regular')->get();
        return $users;
    }

    public function login(Request $data){
        $validate = $data->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $data->email, 'password' => $data->password])){
            if (Auth::user()->type === 'admin'){
                return redirect()->route('dashboard');
            }
            if(!Auth::user()->is_active){
                $id = Auth::id();
                return view('notactive', compact('id'));
            }
            return redirect()->route('welcome');
        } else {
            return back()->withErrors(['error' => 'The provided credentials do not match our records.']);
        }
    }

    public function show(){
        return response()->json($this->getUsers());
    }

    public function create(Request $data){
        $validate = $data->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create([
            'username' => $data->username,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        event(new SendMail($user));

        return response()->json('User created', 200);
    }

    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function resend($id){
        $user = User::find($id);
        event(new SendMail($user));
        return view('sendConfirmation');
    }

    public function delete(Request $request){
        $id = $request->json('id');

        $user = User::find($id);
        if($user->delete()){
            return response()->json('User deleted', 200);
        } else {
            return response()->json('Error', 500);
        }
    }

    public function deactivate(Request $request){
        $id = $request->json('id');
        $user = User::find($id);
        $user->is_active = false;
        if($user->save()){
            return response()->json('User deactivated', 200);
        } else {
            return response()->json('Error', 500);
        }
    }
}
