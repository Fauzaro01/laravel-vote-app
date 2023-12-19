<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RootController;

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

Route::controller(RootController::class)->group(function () {
    Route::get('/', 'root')->name('home');
    Route::get('/id/{id}', 'showvote')->name('vote.show');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});


Route::prefix('vote')->controller(PostController::class)->group(function () {
    // For Debug /vote 
    Route::get('/', 'index')->name('vote');
    Route::get('/test', 'test')->name('vote.test');
    
    Route::get('/create', 'showform')->name('vote.create');
    Route::post('/store', 'store')->name('vote.store');
    
    Route::get('/result', 'result')->name('vote.result');
    Route::post('/vote', 'votepost')->name('vote.send');
});