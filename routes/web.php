<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('cards/trash', [CardController::class, 'trash'])->name('cards.trash');
    Route::get('users', [CardController::class, 'usersList'])->name('users.index');
    Route::get('user/{user:username}', [CardController::class, 'userCards'])->name('user.cards');
    Route::post('/users/{user}/toggle-friend', [UserController::class, 'toggleFriend'])->name('users.toggle-friend');

    Route::resource('cards', CardController::class);
    Route::post('cards/{id}/restore', [CardController::class, 'restore'])->name('cards.restore');
    Route::delete('cards/{id}/force-delete', [CardController::class, 'forceDelete'])->name('cards.forceDelete');

    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


    Route::get('/feed', [CardController::class, 'feed'])->name('feed')->middleware('auth');
});

require __DIR__.'/auth.php';
