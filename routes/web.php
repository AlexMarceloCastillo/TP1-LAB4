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
Route::get('/index','EmpresaController@listAllEmp');

Route::get('/{id}/home','EmpresaController@homeEmp');
Route::get('/{id}/getEmpresa', function ($id){
$empresa = \App\Empresa::find($id);
return response()->json($empresa);
});
/*      ABM      */
Route::get('/abm/empresa','ABMController@listAllEmpresas');
Route::get('/abm/noticia','ABMController@listAllNoticias');
Route::post('/crear/empresa','ABMController@agregarEmpresa');
Route::post('crear/noticia','ABMController@agregarNoticia');
Route::get('/editar/noticia/{id}','ABMController@editarNoticia');
Route::post('/actualizar/noticia','ABMController@actualizarNoticia');
Route::put('/actualizar/empresa/{id}','ABMController@actualizarEmpresa');
Route::delete('/borrar/empresa/{id}','ABMController@borrarEmpresa');
Route::delete('/borrar/noticia/{id}','ABMController@borrarNoticia');
/*DETALLE*/
Route::get('/detalle/{id}','NoticiaController@detalle')->name('detalle');
/*BUSQUEDA*/
Route::get('/busqueda','NoticiaController@busqueda')->name('busqueda');
/* Contenido HTML */
Route::get('/contenido',function(){
  return view('pages.tiny');
});
/*DETALLE NOTICIA*/
Route::get('/detalle/{id}','DetalleController@detalleNoticia');
