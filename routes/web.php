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
Route::get('/abm/empresa','ABMController@listAllEmpresas');
Route::get('/abm/noticia','ABMController@listAllNoticias');
Route::delete('/borrar/empresa/{id}','ABMController@borrarEmpresa');
Route::delete('/borrar/noticia/{id}','ABMController@borrarNoticia');
Route::post('/borrar/noticia','ABMController@borrarNoticia');
Route::post('crear/noticia','ABMController@agregarNoticia');
Route::get('/contenido',function(){
  return view('pages.tiny');
});
