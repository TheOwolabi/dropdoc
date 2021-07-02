<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/print', function () {
    return view('print');
});
Route::get('/print3', function () {
    return view('print_reseaux');
});Route::get('/print2', function () {
    return view('print_data');
});
Route::get('/print1', function () {
    return view('print_syst');
});
Route::get('/profile', function () {
    return view('profile');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/verify', 'App\Http\Controllers\Auth\RegisterController@verifyUser')->name('verify.user');

Route::resource('/projet', 'App\Http\Controllers\ProjetController');

Route::resource('/filiere', 'App\Http\Controllers\FiliereController');

Route::resource('/file', 'App\Http\Controllers\FileController');