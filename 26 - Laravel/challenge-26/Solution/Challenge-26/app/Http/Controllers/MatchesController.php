<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;
use App\Http\Requests\MatchRequest;
use Carbon\Carbon;

class MatchesController extends Controller
{

    public function createMatch(MatchRequest $data){
        $validated = $data->validated();

        Matches::create([
            'team_1' => $data->team1,
            'team_2' => $data->team2,
            'date' => $data->date
        ]);

        return redirect('/')->with('status', 'The match is successfully registered');
    }


}
