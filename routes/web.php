<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

// ------------------------------- Middleware Route -------------------------
Route::middleware(['auth'])->group(function () {
    //  -------------------------------------------- Admin Route -----------------------------------
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

    // ------------------------------------------ Brand Route ------------------------------
    // Route::get('manage-brand', [BrandController::class, 'index'])->name('brand.index');
});