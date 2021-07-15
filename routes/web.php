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

//Login
Route::get('/', function () {
    return view('auth.login');
});

//Autorização
Auth::routes();

//Entidades
Route::resource('/user', 'UserController')->middleware('auth');
Route::resource('/especialidade', 'EspecialidadeController')->middleware('auth');
Route::resource('/dentista', 'DentistaController')->middleware('auth');


//Relatório
Route::get('/relatorio', 'RelatorioController@getRelatorio')->name('relatorio')->middleware('auth');

