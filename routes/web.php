<?php

use App\Http\Controllers\Admin\foodController;
use App\Http\Controllers\Admin\orderController;
use App\Http\Controllers\Admin\tableController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;


//Panel Routes

Route::prefix('panel')->name('panel.')->group(function (){
    Route::get('/', [orderController::class,'index'])->name('dashboard');

    //Table Routes
    Route::get('tables',[tableController::class,'index'])->name('tables');
    Route::get('tables/create',[tableController::class,'create'])->name('tables.create');
    Route::post('tables/store',[tableController::class,'store'])->name('tables.store');
    Route::get('tables/edit/{table}',[tableController::class,'edit'])->name('tables.edit');
    Route::put('tables/update/{table}',[tableController::class,'update'])->name('tables.update');
    Route::delete('tables/destroy/{table}',[tableController::class,'destroy'])->name('tables.destroy');

    //Food Routes
    Route::get('food',[foodController::class,'index'])->name('food');
    Route::get('food/create',[foodController::class,'create'])->name('food.create');
    Route::post('food/store',[foodController::class,'store'])->name('food.store');
    Route::get('food/edit/{food}',[foodController::class,'edit'])->name('food.edit');
    Route::put('food/update/{food}',[foodController::class,'update'])->name('food.update');
    Route::delete('food/destroy/{food}',[foodController::class,'destroy'])->name('food.destroy');

    //Order Routes
    Route::get('order/create',[orderController::class,'create'])->name('order.create');
    Route::post('order/store',[orderController::class,'store'])->name('order.store');

});

//Client Routes
Route::get('/', [homeController::class,'index'])->name('home');
Route::get('/order', [homeController::class,'order'])->name('order');
