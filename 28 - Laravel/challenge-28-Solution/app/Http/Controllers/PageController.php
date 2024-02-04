<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login(){
        return view('login');
    }

    public function index(){
        return view('home');
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function notactive(){
        return view('notactive');
    }
}
