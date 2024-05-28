<?php

use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/restaurant', function () {
    return view('restaurant.show');
});



Route::resource('restaurants', RestaurantController::class);

Route::controller(RestaurantController::class)->group(function () {
    Route::put('/{restaurant}', 'update')->name('restaurant.update');
    Route::any('/', 'index')->name('foodsearch');
    Route::get('/{restaurant}/edit', 'edit')->name('restaurant.edit');
    Route::get('/restaurant/{restaurant}', 'show')->name('restaurant.show');
    Route::get('/restaurant/{restaurant}/destroy/', 'destroy')->name('restaurant.destroy');
    Route::get('/create', 'create')->name('restaurant.create');
    Route::post('/store', 'store')->name('restaurant.store');
});

Route::resource('meal', MealController::class);

Route::controller(OrderController::class)->group(function () {
    Route::get('/restaurant/{meal}/makeorder', 'store')->name('order.store');
    Route::get('/basket', 'index')->name('basket');
    Route::get('/basket/{order}/destroy/', 'destroy')->name('order.destroy');
});

Route::post('/clear-order', [OrderController::class, 'clearOrder'])->name('clear-order');

Route::controller(MealController::class)->group(function () {
    Route::get('/restaurant/{restaurant}/createmeal','create')->name('meal.create');
    Route::get('/meal/{meal}/destroy/', 'destroy')->name('meal.destroy');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
});


