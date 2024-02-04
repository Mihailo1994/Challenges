<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/login', [PageController::class, 'loginView'])->name('login');

Route::post('/login', [PageController::class, 'login'])->name('login');

Route::get('/admin', [PageController::class, 'admin'])->name('admin');

Route::get('/logout', [PageController::class, 'logout']);

Route::post('/add', [PageController::class, 'addProject']);

Route::post('/edit', [PageController::class, 'editProject']);

Route::post('/delete', [PageController::class, 'deleteProject']);
