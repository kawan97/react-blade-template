<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


Route::middleware('auth')->name('dashboard.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //article  routes
    Route::middleware(['permission:article'])->group(function () {
        Route::resource('/article', \App\Http\Controllers\ArticleController::class);
    });
        // //role  routes
        // Route::middleware(['permission:roles'])->group(function () {
        //     Route::resource('/role', \App\Http\Controllers\Dashboard\RoleController::class);
        // });
});

require __DIR__.'/auth.php';
