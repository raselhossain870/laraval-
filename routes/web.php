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

// Backend Routes start

    Route::group(['prefix'=> 'admin'], function () {
     Route::get('/dashboard','App\Http\Controllers\Backend\pagescontroller@index')->name('dashboard');

        //  Brand Route for CRUD
 Route::group(['prefix'=> 'brand'], function () {
     Route::get('/manage','App\Http\Controllers\Backend\BrandController@index')->name('brand.manage');

Route::get('/create','App\Http\Controllers\Backend\BrandController@create')->name('brand.create');

Route::post('/store','App\Http\Controllers\Backend\BrandController@store')->name('brand.store');


});
});
