<?php

use Carbon\Carbon;
use App\Models\Vehicle;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

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




Route::get('/', [PageController::class, 'dashboard'])->middleware('auth')->name('index');
Route::get('/edit/{id}', [PageController::class, 'edit'])->middleware('auth')->name('edit.vehicle');
Route::get('/create', [PageController::class, 'create'])->middleware('auth');


Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');


Route::get('/create/token', [UserController::class, 'createToken'])->middleware('auth');

