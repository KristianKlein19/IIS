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

Auth::routes();

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/users', [App\Http\Controllers\UserListController::class, 'index'])->name('userlist');

    Route::get('/group/delete/{id}', [App\Http\Controllers\GroupController::class, 'destroy'])->name('group.delete');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/groups', [App\Http\Controllers\GroupController::class, 'index'])->name('groups');

    Route::get('/group/create', [App\Http\Controllers\GroupController::class, 'create'])->name('group.create');

    Route::post('/group/store', [App\Http\Controllers\GroupController::class, 'store'])->name('group.store');

    Route::get('/group/edit/{id}', [App\Http\Controllers\GroupController::class, 'edit'])->name('group.edit');

    
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//TODO Route::resource('/password/reset', 'ResetPasswordController');
