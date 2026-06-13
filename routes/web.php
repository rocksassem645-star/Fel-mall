<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        'localeSessionRedirect',
        'localizationRedirect',
        'localeViewPath'
    ]
], function () {

    /*
    |--------------------------------------------------------------------------
    | Public Routes
    |--------------------------------------------------------------------------
    */

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Profile Routes
    |--------------------------------------------------------------------------
    */

    Route::middleware('auth')->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');
    });


    /*
    |--------------------------------------------------------------------------
    | Authentication Routes
    |--------------------------------------------------------------------------
    */

    require __DIR__ . '/auth.php';

    Auth::routes();


    /*
    |--------------------------------------------------------------------------
    | User-Facing Routes (Customers)
    |--------------------------------------------------------------------------
    */

    Route::middleware(['auth'])->group(function () {


        /*
        |--------------------------------------------------------------------------
        | Customer dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/my-account', [App\Http\Controllers\DashboardController::class, 'index'])->name('my.account');

        /*
        |--------------------------------------------------------------------------
        | Shop & Products (User View)
        |--------------------------------------------------------------------------
        */

        // Shop homepage - show all products
        Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

        // Single product details
        Route::get('/product/{id}', [ProductController::class, 'productDetails'])->name('product.show');

        // Products by category
        Route::get('/category/{id}', [CategoryController::class, 'userProducts'])->name('category.products');

        // All categories
        Route::get('/categories', [CategoryController::class, 'userIndex'])->name('categories.index');


        /*
        |--------------------------------------------------------------------------
        | Cart Routes
        |--------------------------------------------------------------------------
        */

        Route::get('/cart', [OrderController::class, 'cart'])->name('cart');

        Route::post('/cart/add/{id}', [OrderController::class, 'addToCart'])->name('cart.add');

        Route::post('/add-to-cart/{id}', [OrderController::class, 'addToCart'])->name('addToCart');

        Route::post('/cart/update/{id}', [OrderController::class, 'updateCart'])->name('cart.update');

        Route::delete('/cart/remove/{id}', [OrderController::class, 'removeFromCart'])->name('cart.remove');


        /*
        |--------------------------------------------------------------------------
        | Orders (User View)
        |--------------------------------------------------------------------------
        */

        // User's order history
        Route::get('/my-orders', [OrderController::class, 'userOrders'])->name('user.orders');

        // Single order details
        Route::get('/my-order/{id}', [OrderController::class, 'userShow'])->name('user.order.show');

        Route::post('/my-order/{id}/cancel', [OrderController::class, 'cancelOrder'])->name('order.cancel');

        Route::delete('/user-order/{id}', [OrderController::class, 'deleteUserOrder'])->name('deleteUserOrder');

        // Checkout
        Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

        Route::post('/checkout/store', [OrderController::class, 'placeOrder'])->name('checkout.store');
    });


    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */

    Route::group(['middleware' => 'CheckAdmin'], function () {

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        /*
        |--------------------------------------------------------------------------
        | User Routes (Admin)
        |--------------------------------------------------------------------------
        */

        Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
        Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');


        /*
        |--------------------------------------------------------------------------
        | Product Routes (Admin)
        |--------------------------------------------------------------------------
        */

        Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
        Route::post('/products/update', [ProductController::class, 'update'])->name('products.update');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');


        /*
        |--------------------------------------------------------------------------
        | Category Routes (Admin)
        |--------------------------------------------------------------------------
        */

        Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('/categories/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');


        /*
        |--------------------------------------------------------------------------
        | Order Routes (Admin)
        |--------------------------------------------------------------------------
        */

        Route::get('/orders/show/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::get('/orders/delete/{id}', [OrderController::class, 'delete'])->name('orders.delete');
    });
});
