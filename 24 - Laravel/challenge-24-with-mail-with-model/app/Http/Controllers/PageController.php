<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{

    public function home(){
        $projects = Project::all();
        return view('home', ['projects' => $projects]);
    }

    public function loginView(){
        if (session()->has('admin')) {
            return redirect()->route('home');
        } else {
            return view('login');
        }
    }

    public function login(Request $request){
        $data = Admin::where('email', $request->email)->first();;

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
        $projects = Project::all();
        if (session()->has('admin')) {
            return view('admin', ['projects' => $projects]);
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

        $project = new Project;
        $project->name = $name;
        $project->subtitle = $subtitle;
        $project->image = $image;
        $project->url = $url;
        $project->description = $description;
        $project->save();

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

        Project::where('id', $id)->update([
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
        Project::destroy($id);
        // DB::table('projects')->where('id', $id)->delete();
        return redirect()->route('admin');
    }

    public function logout() {
        session()->flush();

        return redirect()->route('home');
    }


}
