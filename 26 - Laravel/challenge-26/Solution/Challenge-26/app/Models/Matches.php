<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_1',
        'team_2',
        'team_1_score',
        'team_2_score',
        'date'
    ];

    protected $attributes = [
        'team_1_score' => null,
        'team_2_score' => null
    ];

    public $timestamps = false;

    public function team1(){
        return $this->belongsTo(Team::class, 'team_1', 'id');
    }

    public function team2(){
        return $this->belongsTo(Team::class, 'team_2', 'id');
    }
}
