<?php

use App\Http\Controllers\MatchesController;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function(){
//     dd(Auth::user()->isAdmin());
// });

Route::get('/', [PageController::class, 'home'])->middleware('auth')->name('home');
Route::get('/teams', [PageController::class, 'teams'])->middleware('auth', 'admin')->name('teams');
Route::get('/players', [PageController::class, 'players'])->middleware('auth', 'admin')->name('players');

Route::get('/register', [PageController::class, 'register'])->middleware('logged')->name('register.page');
Route::get('/login', [PageController::class, 'login'])->middleware('logged')->name('login.page');

Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/create/player', [PageController::class, 'createPlayer'])->middleware('auth', 'admin');
Route::get('/create/team', [PageController::class, 'createTeam'])->middleware('auth', 'admin');
Route::get('/create/match', [PageController::class, 'match'])->middleware('auth', 'admin');

Route::post('/create/team', [TeamController::class, 'createTeam'])->middleware('admin')->name('create.team');
Route::get('/edit/{id}/team', [TeamController::class, 'editTeam'])->middleware('admin')->name('edit.team.page');
Route::post('/edit/{id}/team', [TeamController::class, 'saveEditTeam'])->middleware('admin')->name('edit.team');
Route::get('/delete/{id}/team', [TeamController::class, 'deleteTeam'])->middleware('admin')->name('delete.team');

Route::post('/create/player', [PlayerController::class, 'createPlayer'])->middleware('admin')->name('create.player');
Route::get('/edit/{id}/player', [PlayerController::class, 'editPlayer'])->middleware('admin')->name('edit.player.page');
Route::post('/edit/{id}/player', [PlayerController::class, 'saveEditPlayer'])->middleware('admin')->name('edit.player');
Route::get('/delete/{id}/player', [PlayerController::class, 'deletePlayer'])->middleware('admin')->name('delete.player');

Route::post('/create/match', [MatchesController::class, 'createMatch'])->middleware('auth', 'admin')->name('create.match');



Route::get('/match', [MatchesController::class, 'playMatch']);

