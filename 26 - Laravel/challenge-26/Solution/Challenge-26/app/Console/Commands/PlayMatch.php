<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Matches;
use Illuminate\Console\Command;

class PlayMatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'play-match';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Play football match';

    /**
     * Execute the console command.
     */
    public function handle()
    {
            $now = Carbon::today()->toDateString();
            $matches = Matches::all();

            foreach($matches as $match){
                if($match->date == $now) {
                    $team1score = rand(0 , 7);
                    $team2score = rand(0 , 7);
                    $currentMatch = Matches::find($match->id);
                    $currentMatch->team_1_score = $team1score;
                    $currentMatch->team_2_score = $team2score;
                    $currentMatch->save();

                    info('Match has been played between '. $match->team1()->get()->first()->name.' and ' .$match->team2()->get()->first()->name);
                }
            }
    }
}
