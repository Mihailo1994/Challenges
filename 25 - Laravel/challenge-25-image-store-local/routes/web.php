<?php

use App\Models\User;
use App\Models\Discussion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiscussionController;

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




Route::get('/', [PageController::class, 'index'])->name('home');
Route::middleware(['logged'])->group(function () {
    Route::get('/login', [PageController::class, 'login'])->name('login');
    Route::get('/register', [PageController::class, 'register'])->name('register.page');
});
Route::get('/discussion/{id}', [PageController::class, 'discussion']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout.user');
Route::post('/register', [UserController::class, 'register'])->name('register.user');
Route::post('/login', [UserController::class, 'login'])->name('login.user');

Route::middleware(['auth',])->group(function () {
    Route::get('/add/discussion', [DiscussionController::class, 'addDiscussion'])->name('add.discussion');
    Route::get('/pending/discussion', [DiscussionController::class, 'pendingDiscussion'])->middleware('admin');
    Route::post('/add/discussion', [DiscussionController::class, 'saveDiscussion'])->name('save.discussion');
    Route::post('approve/{id}/discussion', [DiscussionController::class, 'approveDiscussion'])->middleware('admin');
    Route::post('edit/{id}/discussion', [DiscussionController::class, 'editDiscussion']);
    Route::post('save/{id}/discussion', [DiscussionController::class, 'saveEditDiscussion']);
    Route::post('delete/{id}/discussion', [DiscussionController::class, 'deleteDiscussion']);
    Route::get('/add/{id}/comment', [DiscussionController::class, 'addComment'])->name('add.comment');
    Route::post('/add/{id}/comment', [DiscussionController::class, 'saveComment'])->name('save.comment');
    Route::post('/edit/{id}/comment', [DiscussionController::class, 'editComment']);
    Route::post('/edit/{id}/comment/save/{discussion_id}', [DiscussionController::class, 'saveEditComment']);
    Route::post('/delete/{id}/comment', [DiscussionController::class, 'deleteComment']);
});




