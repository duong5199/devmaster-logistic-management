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
});

Route::match(['GET','POST'],
    '/login',
    'LoginController@Login')
    ->middleware('non_auth_mw');

Route::get('/logout','LoginController@Logout')
    ->middleware('auth_mw');

//User

Route::get(
    '/user',
    'UserController@indexAction')
    ->middleware('auth_mw');

Route::match(['GET','POST'],
    '/user/add',
    'UserController@createUser')
    ->middleware('auth_mw');

Route::match(['GET','POST'],
    '/user/edit/{id?}',
    'UserController@edit')
    ->middleware('auth_mw');

Route::get(
    '/user/delete/{id?}',
    'UserController@delete')
    ->middleware('auth_mw');

Route::get(
    '/warehouse',
    'WareHouseController@indexAction')
    ->middleware('auth_mw');

Route::match(['GET','POST'],
    '/warehouse/edit/{id?}',
    'WareHouseController@edit')
    ->middleware('auth_mw');

Route::match(['GET','POST'],
    '/warehouse/add',
    'WareHouseController@add')
    ->middleware('auth_mw');

Route::get(
    '/warehouse/delete/{id?}',
    'WareHouseController@delete')
    ->middleware('auth_mw');

Route::get(
    '/thongke',
    'WareHouseController@index')
    ->middleware('auth_mw');
