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

Route::get('/','EmpresaController@listAllEmp');

Route::get('/{id}/home','EmpresaController@homeEmp');

/*      ABM      */
// Route::get('/abm/empresa','EmpresaController@______');
// Route::get('/abm/noticia','NoticiaController@______');


