<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    $products = \App\Models\Product::where('is_active', true)
        ->where('stock', '>', 0)
        ->with('category')
        ->latest()
        ->take(8)
        ->get();

    return view('dashboard', compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Test Multi-Role

Route::middleware(['auth', 'role:admin,editor'])->get('/management', function () {
    return 'Halaman Admin & Editor';
})->name('management');

Route::middleware(['auth', 'role:user'])->get('/user-area', function () {
    return 'Halaman User';
})->name('user.area');

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin,editor')->group(function () {
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])
            ->name('products.edit');

        Route::put('/products/{product}', [ProductController::class, 'update'])
            ->name('products.update');
    });

    Route::middleware('role:admin')->group(function () {
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])
            ->name('products.destroy');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/products', [ShopProductController::class, 'index'])
        ->name('shop.products.index');

    Route::get('/products/{product}', [ShopProductController::class, 'show'])
        ->name('shop.products.show');

    Route::post('/cart/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

    Route::patch('/cart/{product}', [CartController::class, 'update'])
        ->name('cart.update');

    Route::delete('/cart/{product}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])
        ->name('checkout.store');
    
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])
        ->name('checkout.success');
    
    Route::get('/my-orders', [OrderController::class, 'index'])
        ->name('orders.index');

    Route::get('/my-orders/{order}', [OrderController::class, 'show'])
        ->name('orders.show');

    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])
        ->name('reviews.store');
});