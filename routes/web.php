<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Ad;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard',[
             
        'totalUsers' => User::count(),
        'totalAds' => Ad::count(),
        'totalCategories' => Category::count(),
        'recentAds' => Ad::latest()->take(5)->get(),
        'recentUsers' => User::latest()->take(5)->get(),
    ]);
    })->name('dashboard');

    Route::resource('customers', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('ads', AdController::class);
});

Route::middleware(['auth','role:customer'])->prefix('customer')->name('customer.')->group(function() {
    Route::get('/profile',[UserController::class, 'profile'])->name('profile');
    Route::get('/activities',[UserController::class, 'historyActivities'])->name('activities');
    Route::resource('ads', AdController::class);
});
require __DIR__ . '/auth.php';
