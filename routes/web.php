<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::post('/url-store', [\App\Http\Controllers\UrlController::class, 'store'])->name('url.store');
Route::get('/{id}', [\App\Http\Controllers\RedirectController::class, 'index']);
