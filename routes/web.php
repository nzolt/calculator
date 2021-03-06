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
    return view('welcome');
});
/**
 * Defined routes for Calculator
 */
Route::get('form', 'CalculatorController@createAction')->name('form.create');
Route::post('form', 'CalculatorController@calculateAction')->name('form.calculate');
