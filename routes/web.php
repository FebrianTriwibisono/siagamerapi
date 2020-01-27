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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('foo', function () {
    return 'Hello World';
});
Route::resource('member', 'MemberController');
Route::resource('user', 'UserController');
Route::get('/crud', 'CrudController@index');
Route::resource('record', 'RecordController');
//Route::get('home','chartController@index');
//Route::get('charts', 'chartController@index')->name('chart.index');