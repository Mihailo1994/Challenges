<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function home() {
        return view('homepage');
    }

    public function loginPage() {
        return view('formpage');
    }

    public function register(Request $request) {
        $name = $request->input('name');
        $lastName = $request->input('lastName');
        $email = $request->input('email');

        $validatedData = $request->validate([
            'name' => ['required', 'alpha', 'max:15'],
            'lastName' => ['required', 'alpha', 'max:25'],
            'email' => ['nullable', 'email']
        ]);

        session(['name' => $name, 'lastName' => $lastName, 'email' => $email]);

        return view('information');
    }

    public function logout() {
        session()->flush();

        return redirect('home');
    }
}


