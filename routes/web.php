<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get('/cards', [CardController::class, 'index']);
Route::get('/cards/create', [CardController::class, 'create']);
Route::post('/cards', [CardController::class, 'store']);
Route::get('/cards/{card}', [CardController::class, 'show']);
Route::get('/cards/{card}/edit', [CardController::class, 'edit']);
Route::patch('/cards/{card}', [CardController::class, 'update']);
Route::delete('/cards/{card}', [CardController::class, 'destroy']);
