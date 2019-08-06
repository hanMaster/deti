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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/clients', 'ClientController')->middleware('auth');
Route::post('clients/search', 'ClientController@search')->middleware('auth');


Route::resource('/goods', 'GoodsController')->middleware('auth');
Route::resource('/goodsin', 'GoodsInController')->middleware('auth');
Route::resource('/services', 'ServicesController')->middleware('auth');

Route::get('/warehouse', 'WarehouseController@index')->middleware('auth');


Route::post('/new-visiter/{client}', 'CheckController@store')->middleware('auth');
Route::get('calc/{check}', 'CheckController@calculate')->middleware('auth');

//Продажа товара клиенту
Route::get('sell/{check}', 'CheckController@sell')->middleware('auth');
Route::post('sell/{check}', 'CheckController@addSell')->middleware('auth');

//Проведение чека
Route::get('check/{check}', 'CheckController@update')->middleware('auth');

Route::get('/calendar', 'CalendarController@index')->middleware('auth');

Route::get('/calendar/create', 'CalendarController@create')->middleware('auth');
Route::get('/calendar/{calendar}/edit', 'CalendarController@edit')->middleware('auth');
Route::post('/calendar', 'CalendarController@store')->middleware('auth');
Route::post('/calendar/{calendar}', 'CalendarController@update')->middleware('auth');
Route::delete('/calendar/{calendar}', 'CalendarController@destroy')->middleware('auth');

// Абонементы
Route::group(['prefix'=>'abonements', 'middleware'=>'auth'], function(){
  Route::get('/', ['uses'=>'AbonementsController@index', 'as'=>'abonement']);
  Route::get('/create', ['uses'=>'AbonementsController@create']);
  Route::post('/', ['uses'=>'AbonementsController@store']);
  Route::post('/sell', ['uses'=>'AbonementsController@sell']);
  Route::get('/{abonement}/edit', ['uses'=>'AbonementsController@edit']);
  Route::patch('/{abonement}', ['uses'=>'AbonementsController@update']);
  Route::delete('/{abonement}', ['uses'=>'AbonementsController@destroy']);
});

Route::get('/dictionaries', function () {
  return view('dictionaries');
});
