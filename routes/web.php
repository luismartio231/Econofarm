<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\CategoryController;
use App\Models\category;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\ShopingCart;
use Symfony\Component\Routing\Route as ComponentRoutingRoute;

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

Route::get('/', welcomeController::class);

Route::get('search', [SearchController::class, 'show'])->name('search');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('shoping-cart', ShopingCart::class)->name('shoping-cart');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('prueba', function () {

    \Cart::destroy();

});
