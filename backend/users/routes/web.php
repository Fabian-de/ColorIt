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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');
Route::get('admin/{user}/add-color', 'UserController@addColor')->name('admin.addcolor.route')->middleware('admin');
Route::get('admin/{user}/delete-color/{userColor}', 'UserController@deleteColor')->name('admin.deletecolor.route')->middleware('admin');
Route::get('admin/{user}/edit-color/{userColor}', 'UserController@editColor')->name('admin.editcolor.route')->middleware('admin');
Route::get('admin/{user}/update-color/{userColor}', 'UserController@updateColor')->name('admin.updatecolor.route')->middleware('admin');
