<?php

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
 use  Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::match(['GET','POST'],
    '/login',
    'LoginController@Login')
    ->middleware('non_auth_mw');

Route::get('/logout','LoginController@Logout')
    ->middleware('auth_mw');

Route::get(
    '/user/{page?}',
    'UserController@indexAction')
    ->middleware('auth_mw');

Route::get('/dwh','WarehouseController@showDwh')->name('dwh'); //show database

Route::get('/dwh/adwhs','WarehouseController@add')->name('add_dwh'); // add dwh


Route::post('/dwh','WarehouseController@store')->name('store');

Route::get('/test', function() {
    return view('test');
});
Route::get('/dwh/{id}/edit','WarehouseController@edit')->name('edit');

Route::post('/dwh/{id}','WarehouseController@update')->name('put');
