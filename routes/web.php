<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.loggedin');



Route::middleware(['auth:web','verified'])->group(function () {
    Route::get('', [DestinationController::class, 'index'])->name('dest.index');
    Route::get('/user_profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::post('/search', [DestinationController::class, 'search'])->name('dest.search');
    Route::get('show/{destination}', [DestinationController::class, 'show'])->name('dest.show');
    Route::get('create/destination', [DestinationController::class, 'create'])->name('dest.create');
    Route::post('store/destination', [DestinationController::class, 'store'])->name('dest.store');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('admin/index', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');

// });

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('destinations/unapproved', [AdminController::class, 'showUnapprovedDestinations'])->name('admin.destinations.unapproved');
    Route::get('destinations/{destination}', [AdminController::class, 'showDestinationDetails'])->name('admin.destinations.show');
    Route::post('destinations/{destination}/approve', [AdminController::class, 'approveDestination'])->name('admin.destinations.approve');
    Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Auth::routes();

Route::get('/home', function(){
    return redirect()->route('dest.index');
})->name('home')->middleware(['auth','verified']);
