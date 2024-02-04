<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    private function getProjects() {
        $projects = DB::table('projects')->get();
        return $projects;
    }

    public function home(){
        return view('home', ['projects' => $this->getProjects()]);
    }

    public function loginView(){
        if (session()->has('admin')) {
            return redirect()->route('home');
        } else {
            return view('login');
        }
    }

    public function login(Request $request){
        $data = DB::table('admin')->where('email', $request->email)->get()->first();

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($data) {
            $password = $data->password;
            if (Hash::check($request->password, $password)) {
                session(['admin' => 'logged']);
                return redirect()->route('admin');
            } else {
                return redirect()->route('login')->with('msg', 'Погрешна лозинка!');
            }
        } else {
            return redirect()->route('login')->with('msg', 'Погрешен Емаил!');
        }
    }

    public function admin(){
        if (session()->has('admin')) {
            return view('admin', ['projects' => $this->getProjects()]);
        } else {
            return redirect()->route('home');
        }
    }

    public function addProject(Request $request){
        $name = $request->input('name');
        $subtitle = $request->input('subtitle');
        $image = $request->input('image');
        $url = $request->input('url');
        $description = $request->input('description');

        $validatedData = $request->validate([
            'name' => ['required'],
            'subtitle' => ['required'],
            'image' => ['required'],
            'url' => ['required', 'url'],
            'description' => ['required', 'max:200'],
        ]);

        DB::table('projects')->insert([
            'name' => $name,
            'image' => $image,
            'subtitle' => $subtitle,
            'description' => $description,
            'url' => $url
        ]);

        return redirect()->route('admin')->with('success', 'Продуктот е успешно додаден!');
    }

    public function editProject(Request $request) {
        $id = $request->input('id');
        $name = $request->input('name');
        $subtitle = $request->input('subtitle');
        $image = $request->input('image');
        $url = $request->input('url');
        $description = $request->input('description');

        $validatedData = $request->validate([
            'name' => ['required'],
            'subtitle' => ['required'],
            'image' => ['required'],
            'url' => ['required', 'url'],
            'description' => ['required', 'max:200'],
        ]);

        DB::table('projects')->where('id', $id)->update([
                'name' => $name,
                'image' => $image,
                'subtitle' => $subtitle,
                'description' => $description,
                'url' => $url
        ]);


        return redirect()->route('admin');
    }

    public function deleteProject(Request $request) {
        $id = $request->input('id');
        DB::table('projects')->where('id', $id)->delete();

        return redirect()->route('admin');
    }

    public function logout() {
        session()->flush();

        return redirect()->route('home');
    }


}
