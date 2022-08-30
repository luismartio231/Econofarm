<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Ordercontroller;
use App\Models\category;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\CreateOrder;
use App\Http\Livewire\ShopingCart;
use App\Models\Orders;
use Symfony\Component\Routing\Route as ComponentRoutingRoute;




Route::get('/', welcomeController::class);

Route::get('search', [SearchController::class, 'show'])->name('search');

Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('shoping-cart', ShopingCart::class)->name('shoping-cart');

//lo nuevo que voy a crear

Route::get('orders/create', CreateOrder::class)->middleware('auth')->name('orders.create');

Route::get('orders/{order}/payment', [Ordercontroller::class, 'payment'])->name('orders.payment');



Route::get('prueba', function () {

    \Cart::destroy();

});
