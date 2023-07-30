<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Front\ProductDetailsController;

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



Route::get('/', [HomeController::class, 'index']);

Route::get('/filter', [HomeController::class,'filterBooks'])->name('filter.books');

Route::get('/product-details/{id}',[ProductDetailsController::class,'index'])->name('book.details');

Route::prefix('admin')->middleware(['auth', 'verified', 'isAdmin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/authors', AuthorController::class);
    Route::resource('/books', BookController::class);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
