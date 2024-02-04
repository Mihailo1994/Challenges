<?php

use App\Models\User;
use App\Events\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidationController;

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

Route::get('/validation/{email}/{token}', [ValidationController::class, 'ValidateLink'])->name('validation');

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::get('/', [PageController::class, 'index'])->middleware('auth', 'active')->name('welcome');
Route::get('/dashboard', [PageController::class, 'dashboard'])->middleware('auth', 'admin')->name('dashboard');
Route::get('/notactive', [PageController::class, 'notactive'])->name('notactive');

Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/resend/{id}', [UserController::class, 'resend'])->name('resend.link');




