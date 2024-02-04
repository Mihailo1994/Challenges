<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function createTeam(Request $data){
        $data -> validate([
            'name' => 'required',
            'year' => 'required|integer',
        ]);

        Team::create([
            'name' => $data->name,
            'year_of_foundation' => $data->year
        ]);

        return redirect('teams')->with('status', 'The Team is successfully
        registered');

    }

    public function editTeam($id){
        $team = Team::find($id);
        return view('editTeam', compact('team'));
    }

    public function saveEditTeam(Request $data, $id){
        $validate = $data -> validate([
            'name' => 'required',
            'year' => 'required|integer',
        ]);

        $team = Team::find($id);
        $team->name = $data->name;
        $team->year_of_foundation = $data->year;
        $team->save();

        return redirect('/teams')->with('status', 'Team successfully edited');

    }

    public function deleteTeam($id){
        $team = Team::find($id);
        $team->delete();

        return redirect()->back()->with('status', 'Team successfully deleted');
    }
}
