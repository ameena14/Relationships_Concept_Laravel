<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/categories', [UserDashboardController::class, 'showCategories'])->name('user.categories');
Route::get('/categories/{category}', [UserDashboardController::class, 'showSubcategories'])->name('user.subcategories');
Route::get('/subcategories/{subcategory}', [UserDashboardController::class, 'showExamples'])->name('user.examples');



require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
