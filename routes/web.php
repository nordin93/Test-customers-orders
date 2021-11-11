<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CustomersController;

Auth::routes(); 

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customers', 'CustomersController')->except('show')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/orders',  [OrdersController::class, 'index'])->middleware('auth')->name('order');

Route::get('/orders/create',  [OrdersController::class, 'create'])->middleware('auth')->name('create');

Route::post('/orders/create',  [OrdersController::class, 'store'])->middleware('auth')->name('store');

Route::get('/orders/{order}/edit',  [OrdersController::class, 'edit'])->middleware('auth')->name('edit');

Route::put('/orders/{order}/update', [OrdersController::class, 'update'])->name('update');

Route::get('/order/trash', [OrdersController::class, 'orderTrash'])->name('orderTrash');

Route::get('/order/delete/{delete}', [OrdersController::class, 'delete'])->name('order.delete');

Route::delete('/order/delete/{order}', [OrdersController::class, 'destroy'])->name('order.destroy');

Route::get('/customer/trash', [CustomersController::class, 'customerTrash'])->name('customerTrash');

Route::get('/customer/delete/{delete}', [CustomersController::class, 'delete'])->name('customer.delete');

Route::delete('/customer/delete/{customer}', [CustomersController::class, 'destroy'])->name('customer.destroy');

Route::get('/order/contract', [OrdersController::class, 'contractView'])->name('contract');

Route::get('/tags/associated/{order}', [OrdersController::class, 'tagView'])->name('tag');
