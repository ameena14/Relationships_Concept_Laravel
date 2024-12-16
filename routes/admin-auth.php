<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ExampleController;

Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [LoginController::class, 'store']);

});

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/categories', [AdminController::class, 'index'])->name('categories.index');
    Route::post('/add-category', [AdminController::class, 'store'])->name('categories.store');
    Route::post('/subcategories/store', [SubcategoryController::class, 'store'])->name('subcategories.store');
    Route::get('/subcategories', [SubcategoryController::class, 'index'])->name('subcategories.index');
    Route::post('/examples/store', [ExampleController::class, 'store'])->name('examples.store');
    Route::get('/examples', [ExampleController::class, 'index'])->name('examples.index');

    Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');

});