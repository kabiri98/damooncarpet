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
    return view('welcome');
});
Route::namespace('Admin')->prefix('admin')->group(function(){
    // Route::get('/alluserdatatabels','UserController@alluserdatatabels')->name('users.alluserdatatabels');
    // Route::get('/index1','UserController@index1')->name('users.index1');
    
    Route::get('/panel', 'PanelController@index');
    Route::resource('product','ProductController');
});
