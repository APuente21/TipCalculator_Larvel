<?php

#New place holder routes for P3
Route::get('/', 'TipController@index');
Route::get('/cal', 'TipController@index');
Route::post('/process-form', 'TipController@processForm');
Route::get('/cal/{split}', 'TipController@result');



Route::get('/env', function () {
    dump(config('app.name'));
    dump(config('app.env'));
    dump(config('app.debug'));
    dump(config('app.url'));
});

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
