<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Auth::routes(['register'=>false]);

Route::group(['middleware'=>'auth','rolePermission'],function(){
  Route::get('/home', 'HomeController@index')->name('home'); 
  Route::resource('role','RoleController');
  Route::resource('permission','PermissionController');
  Route::resource('user','UserController');
});
