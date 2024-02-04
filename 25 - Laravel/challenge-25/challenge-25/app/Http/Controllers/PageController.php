<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index() {
        $discussions = Discussion::all();
        return view('home')->with('discussions', $discussions);

    }

    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function discussion($id){
        $discussion = Discussion::find($id);
        $comments = $discussion->comment()->select('comments.*', 'users.username')->join('users', 'users.id', '=', 'user_id')->get();
        return view('discussion', compact('discussion', 'comments'));

    }
}
