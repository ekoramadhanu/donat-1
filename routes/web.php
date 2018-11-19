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

Route::get('/', 'BerandaController@index');
Route::get('/npsn', 'NpsnController@index');
Route::get('/penelitian', 'PenelitianController@index');
Route::get('/registrasi', 'RegistrasiController@index');
Route::get('/kemajuan', 'KemajuanController@index');

Route::post('/registrasi', 'RegistrasiController@action');
Route::post('/kemajuan', 'KemajuanController@action');
Route::post('/npsn', 'NpsnController@action');
Route::post('/penelitian', 'PenelitianController@action');

Route::post('/npsn/update', 'NpsnController@actionUpdate');
Route::post('/penelitian/update', 'PenelitianController@actionUpdate');

Route::post('/npsn/upload', 'NpsnController@uploadDokumen');
Route::post('/penelitian/upload', 'PenelitianController@uploadDokumen');