<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CoponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminOrderController;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// -------------------------------- Frontend Rout -------------------------------------
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/product/detalis/{id}', [FrontendController::class, 'productDedalis']);

// -------------------------------- Cart Route ---------------------------------
Route::post('add-to-cart/{cart_id}', [CartController::class, 'showCart'])->name('show.cart');
Route::get('cart-page', [CartController::class, 'cartpage'])->name('cartPage');
Route::get('cart-remove/{cart_id}', [CartController::class, 'cartRemove'])->name('cart.destroy');
Route::post('cart-update/{cart_id}', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::post('apply-copon', [CartController::class, 'applyCopon'])->name('apply.copon');
Route::get('copon-romeve', [CartController::class, 'coponRemove'])->name('remove.copon');

//----------------------------- CheckOut Route ----------------
Route::get('check-out', [CartController::class, 'checkOut'])->name('checkout.index');

//----------------------------------- Order Route -----------------------------
Route::post('plase-order', [OrderController::class, 'store'])->name('store.order');
Route::get('order-success', [OrderController::class, 'orderComplate'])->name('orderSuccess');

// ------------------------------- Middleware Route -------------------------
Route::middleware(['auth', 'isAdmin'])->group(function () {
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

    // ------------------------------------------ Product Route ------------------------------
    Route::get('manage-product', [ProductController::class, 'index'])->name('product.index');
    Route::get('add-product', [ProductController::class, 'create'])->name('product.create');
    Route::post('product-store', [ProductController::class, 'store'])->name('product.store');
    Route::get('product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product-update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product-delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('product-inactive/{id}', [ProductController::class, 'inactive'])->name('product.inactive');
    Route::get('product-active/{id}', [ProductController::class, 'active'])->name('product.active');


    // ------------------------------------------ Copon Route ------------------------------
    Route::get('manage-copon', [CoponController::class, 'index'])->name('copon.index');
    Route::get('add-copon', [CoponController::class, 'create'])->name('copon.create');
    Route::post('copon-store', [CoponController::class, 'store'])->name('copon.store');
    Route::get('copon-edit/{id}', [CoponController::class, 'edit'])->name('copon.edit');
    Route::put('copon-update/{id}', [CoponController::class, 'update'])->name('copon.update');
    Route::delete('copon-delete/{id}', [CoponController::class, 'destroy'])->name('copon.destroy');
    Route::get('copon-inactive/{id}', [CoponController::class, 'inactive'])->name('copon.inactive');
    Route::get('copon-active/{id}', [CoponController::class, 'active'])->name('copon.active');

    // ------------------------------------------ Admin Order Route -----------------------------
    Route::get('admin-order', [AdminOrderController::class, 'showData'])->name('order.index');
    Route::get('admin-order-view/{product_id}', [AdminOrderController::class, 'view'])->name('order.view');
    Route::delete('admin-order-delete/{product_id}', [AdminOrderController::class, 'destoy'])->name('order.destoy');
});