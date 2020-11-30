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
    Route::get('/edit-profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit-profile');

    Route::put('/update-profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('update-profile');

    Route::get('/group/create', [App\Http\Controllers\GroupController::class, 'create'])->name('group.create');

    Route::post('/group/store', [App\Http\Controllers\GroupController::class, 'store'])->name('group.store');

    Route::get('/group/edit/{id}', [App\Http\Controllers\GroupController::class, 'edit'])->name('group.edit');

    Route::put('/group/update/{id}', [App\Http\Controllers\GroupController::class, 'update'])->name('group.update');

    Route::get('/groups/{id}/members', [App\Http\Controllers\GroupController::class, 'members'])->name('group.members');

    Route::get('/groups/{id}/requests', [App\Http\Controllers\RequestController::class, 'index'])->name('group.requests');

    Route::get('/group/{id1}/thread/{id2}', [App\Http\Controllers\ThreadController::class, 'index'])->name('thread');

    Route::get('/request/{id}/reject', [App\Http\Controllers\RequestController::class, 'reject'])->name('request.reject');

    Route::get('/request/{id}/accept', [App\Http\Controllers\RequestController::class, 'accept'])->name('request.accept');

    Route::get('/groups/{id}/request-membership', [App\Http\Controllers\RequestController::class, 'showMembershipRequestForm'])->name('membership-form');

    Route::post('/request/membership', [App\Http\Controllers\RequestController::class, 'member'])->name('request.membership');

    Route::get('/groups/{id}/request-moderator', [App\Http\Controllers\RequestController::class, 'showModeratorRequestForm'])->name('moderator-form');

    Route::post('/request/moderator', [App\Http\Controllers\RequestController::class, 'moderator'])->name('request.moderator');
});


Route::get('/groups', [App\Http\Controllers\GroupController::class, 'index'])->name('groups');

Route::get('/profiles/{user_id}', [App\Http\Controllers\ProfileController::class, 'show']);

Route::get('/groups/{id}', [App\Http\Controllers\GroupController::class, 'view'])->name('group.view');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//TODO Route::resource('/password/reset', 'ResetPasswordController');
