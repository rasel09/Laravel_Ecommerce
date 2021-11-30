<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// -------------------------------- Frontend Rout -------------------------------------
Route::get('/', [FrontendController::class, 'index']);

// ------------------------------- Middleware Route -------------------------
Route::middleware(['auth'])->group(function () {
    //  -------------------------------------------- Admin Route -----------------------------------
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

    // ------------------------------------------ Brand Route ------------------------------
    Route::get('manage-brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('add-brand', [BrandController::class, 'create'])->name('brand.create');
    Route::post('brand-store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('brand-edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('brand-update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('brand-delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    Route::get('brand-inactive/{id}', [BrandController::class, 'inactive'])->name('brand.inactive');
    Route::get('brand-active/{id}', [BrandController::class, 'active'])->name('brand.active');

    // ------------------------------------------ Category Route ------------------------------
    Route::get('manage-category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('add-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category-store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('catgegory-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category-delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('category-inactive/{id}', [CategoryController::class, 'inactive'])->name('category.inactive');
    Route::get('category-active/{id}', [CategoryController::class, 'active'])->name('category.active');
});