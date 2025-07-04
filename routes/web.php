<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SgdController;
use App\Http\Controllers\MentalTestController;

Route::get('/', function () {
    return view('auth.login');
})->name('start');

Route::get('/dashboard', function () {
    return view('main.main');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/support-group-discussion', [SgdController::class, 'show'])->name('sgd');
    Route::get('/mental-health-test', [MentalTestController::class, 'index'])->name('mental.test');
    Route::POST('/mental-health-test/submit', [MentalTestController::class, 'submit'])->name('mental-test.submit');
});




require __DIR__.'/auth.php';


// API

Route::middleware('auth')->group(function () {
    Route::get('/user', [AuthenticatedSessionController::class, 'getUser'])->name('user.get');

    Route::get('/agenda/pending', [AgendaController::class, 'getPending'])->name('getPendingAgenda');
    Route::get('/quote/today', [QuoteController::class, 'quoteOfTheDay']);

    Route::post('support-group-discussion/create', [SgdController::class, 'createGroup'])->name('group.create');
    Route::get('/support-group-discussion/get', [SgdController::class, 'getGroups'])->name('group.get');
});