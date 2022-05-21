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

Route::middleware(['auth'])->group(function () {


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


});
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/auth', [UserController::class,'auth'])->name('auth.login');
Route::get('/logout', [UserController::class,'logout'])->name('logout');

Route::get('/register', function(){
    return view('user.create');
})->name('register');
Route::post('/create', [ UserController::class, 'create' ])->name('create');

Route::get('/reset-password', function(){
    return view('auth.reset_password');
})->name('reset.password.view');

Route::get('/reset-password-user',  [ UserController::class, 'reset_password_view_user' ])->name('reset.password.view_user');
Route::post('/update-password', [ UserController::class, 'update_password_user' ])->name('update_password');

Route::get('/user-active', [ UserController::class,'user_active' ])->name('user.active');


