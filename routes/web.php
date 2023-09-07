<?php

use App\Http\Controllers\UserController;
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



// route to login page
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/userHome/{id}', [UserController::class, 'show'])->name('userHome.show');
Route::post('/register/store', [UserController::class, 'store'])->name('register.store');
Route::get('/userProfile', function () {
    return view('profile');
})->name('profile');
