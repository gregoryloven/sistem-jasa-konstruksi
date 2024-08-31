<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('home.index');
});

Auth::routes();

Route::resource('house_type', HouseTypeController::class);
Route::post('/house_type/EditForm', [App\Http\Controllers\HouseTypeController::class, 'EditForm'])->name('house_type.EditForm');

Route::resource('house_type_detail', HouseTypeDetailController::class);
Route::post('/house_type_detail/EditForm', [App\Http\Controllers\HouseTypeDetailController::class, 'EditForm'])->name('house_type_detail.EditForm');


Route::resource('contractor', ContractorController::class);
Route::get('contractor/filter', [ContractorController::class, 'index']);
Route::post('/contractor/accept', [App\Http\Controllers\ContractorController::class, 'accept'])->name('contractor.accept');
Route::post('/contractor/decline/{id}', [App\Http\Controllers\ContractorController::class, 'decline'])->name('contractor.decline');

//for user
Route::resource('house_type_user', HouseTypeController::class);
Route::get('/house_type_detail_user/{id}', [App\Http\Controllers\HouseTypeDetailController::class, 'show'])->name('house_type_detail_user.show');

Route::resource('order', OrderController::class);
Route::get('/get-orders', [App\Http\Controllers\OrderController::class, 'getOrders']);
Route::get('/get-contractors/{house_type_id}', [App\Http\Controllers\OrderController::class, 'getContractors'])->name('order.getContractors');


Route::get('/home', 'HomeController@index')->name('home');
