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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth_mw');

Route::match(['GET','POST'],
    '/login',
    'LoginController@Login')
    ->middleware('non_auth_mw');

Route::get('/logout','LoginController@Logout');

Route::middleware(['auth_mw','admin'])->group(function () {

    Route::get(
        '/user',
        'UserController@indexAction');

    Route::match(['GET','POST'],
        '/user/add',
        'UserController@createUser');

    Route::match(['GET','POST'],
        '/user/edit/{id?}',
        'UserController@edit');

    Route::get(
        '/user/delete/{id?}',
        'UserController@delete');

    Route::get(
        '/warehouse',
        'WareHouseController@indexAction');

    Route::match(['GET','POST'],
        '/warehouse/edit/{id?}',
        'WareHouseController@edit');

    Route::match(['GET','POST'],
        '/warehouse/add',
        'WareHouseController@add');

    Route::get(
        '/warehouse/delete/{id?}',
        'WareHouseController@delete');

    Route::get(
        '/thongke',
        'WareHouseController@index');
});
