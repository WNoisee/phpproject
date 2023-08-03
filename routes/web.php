<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('wel', 'App\Http\Controllers\MyController@Welcome');

Route::post('register', 'App\Http\Controllers\MyController@registers')->name('register');

Route::get('run', 'App\Http\Controllers\MyController@run')->name('return');

Route::post('login', 'App\Http\Controllers\MyController@signUp')->name('login');

Route::post('show', 'App\Http\Controllers\MyController@getProduct')->name('show');

Route::get('toShow', 'App\Http\Controllers\MyController@toShow')->name('toShow');

Route::get('toDelete/{id}','App\Http\Controllers\MyController@Todelete')->name('Delete');

Route::get('toRepair/{id}', 'App\Http\Controllers\MyController@repair')->name('toRepair');

Route::post('Repaired/{id}', 'App\Http\Controllers\MyController@Repaired')->name('Repaired');

Route::get('test', 'App\Http\Controllers\MyController@test');

Route::post('testpost', 'App\Http\Controllers\MyController@testpost')->name('test');

Route::get('logout','App\Http\Controllers\MyController@logOut')->name('logout');

Route::get('validate', 'App\Http\Controllers\MyController@val');

Route::post('validatePost', 'App\Http\Controllers\MyController@valPost')->name('validate');

Route::get('MDsign', 'App\Http\Controllers\MyController@MDsign');

Route::post('MDsign', 'App\Http\Controllers\MyController@MDpost')->name('MDsign');

