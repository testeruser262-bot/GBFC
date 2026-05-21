<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentSetupController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerPaymentController;
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

    // ******************* Event Module **********************

    Route::get('/event', function () {
        return view('admin.event.index');
    });

    Route::get('/event/create', [EventController::class, 'create'])
        ->name('event.create');

    Route::post('/event/store', [EventController::class, 'store'])
        ->name('event.store');

    Route::get('/event', [EventController::class, 'index'])
        ->name('event.index');

    Route::get('/event/edit/{id}', [EventController::class, 'edit'])
        ->name('event.edit');

    Route::post('/event/update/{id}', [EventController::class, 'update'])->name('event.update');

    Route::get('/event/delete/{id}', [EventController::class, 'delete'])->name('event.delete');

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

    Route::post('/team/{id}/add-players', [TeamController::class, 'addPlayers'])
        ->name('admin.team.addPlayers');

    Route::get('/team/player/remove/{id}', [TeamController::class, 'removePlayer'])
        ->name('admin.team.removePlayer');

    Route::get('/team/view/{id}', [TeamController::class, 'teamPlayer'])
        ->name('team.view');

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

    //  **************** Payment Payment ****************

    Route::get('/reg-player-payment', [PlayerPaymentController::class, 'index']);

    Route::get('/admin/player-payment/download/{id}',
        [PlayerPaymentController::class, 'download']
    )->name('player-payment.download');

});

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/club-register', [RegisterController::class, 'showRegisterForm'])->name('club-register');
Route::post('/club-register', [RegisterController::class, 'register']);

Route::get('/club-login', function () {
    return view('frontend.login');
});

Route::get('/club-payment', function () {
    return view('frontend.payment');
});

Route::get('/payment', [PaymentController::class, 'index']);

Route::post('/stripe-charge', [PaymentController::class, 'charge'])->name('stripe.charge');

Route::get('/club-thanks', function () {
    return view('frontend.thanku');
});
