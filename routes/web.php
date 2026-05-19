<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentSetupController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Login Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/admin/login', [AuthController::class, 'authenticate'])
    ->name('authenticate');

Route::get('/admin/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Redirect Root
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/admin/sports');
});

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware('checklogin')->group(function () {

    //  **************** Sports Module ***********************

    Route::get('/sports', [SportController::class, 'index']);

    Route::get('/sport/create', function () {
        return view('admin.sports.create');
    });

    Route::post('/sport/store', [SportController::class, 'store'])
        ->name('sport.store');

    Route::get('/sport/edit/{id}', [SportController::class, 'edit'])
        ->name('admin.sport.edit');

    Route::put('/sport/update/{id}', [SportController::class, 'update'])
        ->name('sport.update');

    Route::get('/sport/delete/{id}', [SportController::class, 'destroy'])
        ->name('sport.delete');

    //  **************** Team Module ***********************

    Route::get('/teams', [TeamController::class, 'index']);

    Route::get('/team/create', [TeamController::class, 'create'])
        ->name('team.create');

    Route::post('/team/store', [TeamController::class, 'store'])
        ->name('team.store');

    Route::get('/team/edit/{id}', [TeamController::class, 'edit'])
        ->name('admin.team.edit');

    Route::post('/team/update/{id}', [TeamController::class, 'update'])
        ->name('team.update');

    Route::get('/team/delete/{id}', [TeamController::class, 'destroy'])
        ->name('team.delete');

    //  **************** Players Module ***********************

    Route::get('/players', [PlayerController::class, 'index']);

    Route::get('/players/create', function () {
        return view('admin.players.create');
    });

    Route::post('/players/store', [PlayerController::class, 'store'])
        ->name('players.store');

    Route::get('/player/edit/{id}', [PlayerController::class, 'edit'])
        ->name('admin.players.edit');

    Route::put('/player/update/{id}', [PlayerController::class, 'update'])
        ->name('admin.players.update');

    Route::get('/player/delete/{id}', [PlayerController::class, 'destroy'])
        ->name('players.delete');

    // **************** Payment Structure ****************

    Route::get('/payment', [PaymentSetupController::class, 'create'])
        ->name('payment.create');

    Route::post('/payment', [PaymentSetupController::class, 'store'])
        ->name('payment_setup.store');

});
