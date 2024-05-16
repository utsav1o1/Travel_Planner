<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.loggedin');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('admin/index', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});


Route::middleware(['auth'])->group(function () {
    Route::get('', [DestinationController::class, 'index'])->name('dest.index');
    Route::get('/user_profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::post('/search', [DestinationController::class, 'search'])->name('dest.search');
    Route::get('show/{destination}', [DestinationController::class, 'show'])->name('dest.show');
    Route::get('create/destination', [DestinationController::class, 'create'])->name('dest.create');
    Route::post('store/destination', [DestinationController::class, 'store'])->name('dest.store');
});
