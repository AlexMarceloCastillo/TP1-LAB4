<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Empresa;

use App\Noticia;

class ABMController extends Controller
{
    //ABM de Empresas
   public function listAllEmpresas(){
       $empresas = Empresa::paginate(6);
       return view('pages.abm.empresas',compact('empresas'));
   }
   //Agregar Empresa
   public function agregarEmpresa(Request $request){
      $empresa = new Empresa();
      $empresa->denominacion = $request['denominacion'];
      $empresa->telefono = $request['telefono'];
      $empresa->hs_atencion = $request['horario'];
      $empresa->q_somos = $request['q_somos'];
      $empresa->latitud = $request['latitud'];
      $empresa->longitud = $request['longitud'];
      $empresa->domicilio = $request['domicilio'];
      $empresa->email = $request['email'];
      $empresa->save();
      return response()->json($empresa);
   }
   //Actualizar Empresa
   public function actualizarEmpresa($id, Request $request){
      $empresa = Empresa::findOrFail($id);
      $empresa->denominacion = $request['denominacion'];
      $empresa->telefono = $request['telefono'];
      $empresa->hs_atencion = $request['horario'];
      $empresa->q_somos = $request['q_somos'];
      $empresa->latitud = $request['latitud'];
      $empresa->longitud = $request['longitud'];
      $empresa->domicilio = $request['domicilio'];
      $empresa->email = $request['email'];
      $empresa->update();
      return response()->json($empresa);
   }

   //Borrar empresa
   public function borrarEmpresa($id){
      $empresa = Empresa::findOrFail($id);
      foreach ($empresa->noticias as $key => $noticias) {
        $noticias->delete();
      }
      $empresa->delete();
      $response = array('status' => 'success','msg' => 'Element delete successfully',);
      return response()->json($response);
   }

   //ABM de Noticias
   public function listAllNoticias(){
       $noticias = Noticia::paginate(6);
       $empresas = Empresa::all();
       $vac = compact('noticias','empresas');
       return view('pages.abm.noticias',$vac);
   }
   //Agregar Noticia
   public function agregarNoticia(Request $form){
       $noticia = new Noticia();
       $noticia->titulo = $form['titulo'];
       $noticia->resumen = $form['resumen'];
       $path = $form->file('imagen_noticia')->store('public/img/noticias');
       $nombreArchivo = basename($path);
       $noticia->img = $nombreArchivo;
       $noticia->publicada = $form['publicar'];
       $noticia->fecha_publicacion = $form['fecha_publicacion'];
       $noticia->empresa_id = $form['empresa'];
       $noticia->contenido_html = $form['contenido_html'];
       $noticia->save();
       return redirect('/abm/noticia');
   }
   //Editar Noticia
   public function editarNoticia($id){
       $noticia = Noticia::find($id);
       $empresas = Empresa::all();
       $vac = compact('noticia','empresas');
       return view('pages.editar.editarNoticia',$vac);
   }
   //Actualizar Noticia
   public function actualizarNoticia(Request $form){
       $noticia = Noticia::findOrFail($form['id']);
       $noticia->titulo = $form['titulo'];
       $noticia->resumen = $form['resumen'];
       $noticia->contenido_html = $form['contenido_html'];
       if($form['imagen_noticia'] != null){
       $path = $form->file('imagen_noticia')->store('public/img/noticias');
       $archivo = basename($path);
       $noticia->img = $archivo;
       }
       $noticia->publicada = $form['publicar'];
       if($form['fecha_publicacion'] != null){
        dd($form);
       $noticia->fecha_publicacion = $form['fecha_publicacion'];
       }
       $noticia->empresa_id = $form['empresa'];
       $noticia->update();
       return redirect('/abm/noticia');
   }
   //Borrar Noticia
   public function borrarNoticia($id){
       $noticia = Noticia::findOrFail($id);
       $noticia->delete();
       $response = array('status' => 'success','msg' => 'Element delete successfully',);
       return response()->json($response);
   }
}
