<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

//  **************** Sports  Module  ***********************

Route::get('/', function () {
    return redirect('/sports');
});

Route::get('/sports', [SportController::class, 'index']);

Route::get('/sport/create', function () {
    return view('admin.sports.create');
});

Route::post('/sport/store', [SportController::class, 'store'])->name('sport.store');

Route::get('/sport/edit/{id}', [SportController::class, 'edit'])
    ->name('admin.sport.edit');

Route::put('/sport/update/{id}', [SportController::class, 'update'])->name('sport.update');

Route::get('/sport/delete/{id}', [SportController::class, 'destroy'])
    ->name('sport.delete');

//  **************** Team Module  ***********************

Route::get('/teams', [TeamController::class, 'index']);

Route::get('/team/create', function () {
    return view('admin.team.create');
});

Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');

Route::get('/team/edit/{id}', [TeamController::class, 'edit'])
    ->name('admin.team.edit');

Route::post('/team/update/{id}', [TeamController::class, 'update']);

Route::get('/team/delete/{id}', [TeamController::class, 'destroy'])
    ->name('players.delete');

//  **************** Players Module  ***********************

Route::get('/players', [PlayerController::class, 'index']);

Route::get('/players/create', function () {
    return view('admin.players.create');
});

Route::post('/players/store', [PlayerController::class, 'store'])->name('players.store');

Route::get('/player/edit/{id}', [PlayerController::class, 'edit'])
    ->name('admin.players.edit');

Route::put('/player/update/{id}', [PlayerController::class, 'update'])
    ->name('admin.players.update');

Route::get('/player/delete/{id}', [PlayerController::class, 'destroy'])
    ->name('players.delete');

// Payment Structure

Route::get('/payment', function () {
    return view('admin.paymentStucture.index');
});

// Login Module

Route::get('/login', function () {
    return view('auth.login');
});
