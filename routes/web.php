<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, "homePage"]);

Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournaments.index');
Route::get('/tournaments/create', [TournamentController::class, 'create'])->name('tournaments.create');
Route::post('/tournaments', [TournamentController::class, 'store'])->name('tournaments.store');
