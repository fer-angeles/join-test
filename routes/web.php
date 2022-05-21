<?php

use App\Http\Controllers\UserController;
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

Route::get('/login', [UserController::class,'login'])->name('login');
Route::get('/auth', [UserController::class,'auth'])->name('auth.login');
Route::post('/logout', [])->name('logout');

Route::get('/register', [ UserController::class, 'register' ])->name('register');
Route::post('/create', [ UserController::class, 'create' ])->name('create');

Route::get('/list', [ UserController::class ])->name('register');


