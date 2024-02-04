<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function createPlayer(Request $data){
        $validate = $data->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required|date',
            'team' => 'required',
        ]);

        Player::create([
            'name' => $data->name,
            'surname' => $data->surname,
            'date_of_birth' => $data->birthDate,
            'team_id' => $data->team,
        ]);

        return redirect('players')->with('status', 'The player is successfully registered');
    }

    public function editPlayer($id){
        $player = Player::find($id);
        $teams = Team::all();
        return view('editPlayer', compact('player', 'teams'));
    }

    public function saveEditPlayer(Request $data, $id){
        $validate = $validate = $data->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthDate' => 'required|date',
            'team' => 'required',
        ]);

        $player = Player::find($id);
        $player->name = $data->name;
        $player->surname = $data->surname;
        $player->date_of_birth = $data->birthDate;
        $player->team_id = $data->team;
        $player->save();

        return redirect('players')->with('status', 'Player successfully edited');

    }

    public function deletePlayer($id){
        $player = Player::find($id);
        $player->delete();

        return redirect()->back()->with('status', 'Player successfully deleted');
    }


}
