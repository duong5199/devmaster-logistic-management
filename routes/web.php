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
    '/user/{page?}',
    'UserController@indexAction')
    ->middleware('auth_mw');

Route::match(['GET','POST'],
    '/CreateUser',
    'UserController@createUser')
    ->middleware('auth_mw');

Route::match(['GET','POST'],
    'user/edit/{id?}',
    'UserController@edit')
    ->middleware('auth_mw');

Route::get(
    'user/delete/{id?}',
    'UserController@delete')
    ->middleware('auth_mw');
