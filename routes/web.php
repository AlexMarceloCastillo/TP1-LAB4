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
Route::post('/crear/empresa','ABMController@agregarEmpresa');
Route::post('crear/noticia','ABMController@agregarNoticia');
Route::get('/editar/noticia/{id}','ABMController@editarNoticia');
Route::get('/editar/empresa/{id}','ABMController@editarEmpresa');
Route::post('/actualizar/noticia','ABMController@actualizarNoticia');
Route::post('/actualizar/empresa','ABMController@actualizarEmpresa');
Route::delete('/borrar/empresa/{id}','ABMController@borrarEmpresa');
Route::delete('/borrar/noticia/{id}','ABMController@borrarNoticia');
/* Contenido HTML */
Route::get('/contenido',function(){
  return view('pages.tiny');
});
