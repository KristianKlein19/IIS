<?php

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
    return view('home');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/users', [App\Http\Controllers\UserListController::class, 'index'])->name('userlist');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/edit-profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit-profile');
});

Route::middleware(['auth'])->group(function() {
    Route::put('/update-profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('update-profile');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/password/reset', 'ResetPasswordController');
