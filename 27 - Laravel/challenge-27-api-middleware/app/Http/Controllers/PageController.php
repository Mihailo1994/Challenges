<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function create(){
        return view('create');
    }

    public function edit($id){
        return view('edit', compact('id'));
    }
}
