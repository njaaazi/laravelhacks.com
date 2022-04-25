<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateHacksController;
use App\Http\Controllers\GetAllHacksController;
use App\Http\Controllers\GetSingleHackController;
use App\Http\Controllers\SubmitHacksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', GetAllHacksController::class)->name('home');
Route::get('/hacks/{hack}', GetSingleHackController::class)->name('hack.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/submit', CreateHacksController::class)->name('hack.create');
    Route::post('/submit', SubmitHacksController::class)->name('hack.submit');
});

require __DIR__.'/auth.php';
