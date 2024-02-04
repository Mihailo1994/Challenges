<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function home(){
        $matches = Matches::orderBy('date', 'asc')->get();
        return view('home', compact('matches'));
    }

    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function createPlayer(){
        $teams = Team::all();
        return view('createPlayer', compact('teams'));
    }

    public function createTeam(){
        return view('createTeam');
    }

    public function teams(){
        $teams = Team::all();
        return view('teams', compact('teams'));
    }

    public function players(){
        $players = Player::all();
        return view('players', compact('players'));
    }

    public function match(){
        $teams = Team::all();
        return view('createMatch', compact('teams'));
    }

}
