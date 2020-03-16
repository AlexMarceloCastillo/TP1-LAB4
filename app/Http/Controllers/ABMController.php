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
       $empresas = Empresa::all();
       return view('pages.abm.empresas',compact('empresas'));
   }
   //Agregar Empresa
   public function agregarEmpresa(Request $form){
       $empresa = new Empresa();
       $empresa->denominacion = $form['denominacion'];
       $empresa->telefono = $form['telefono'];
       $empresa->hs_atencion = $form['horario'];
       $empresa->q_somos = $form['quienes_somos'];
       $empresa->latitud = $form['latitud'];
       $empresa->longitud = $form['longitud'];
       $empresa->domicilio = $form['domicilio'];
       $empresa->email = $form['email'];
       $empresa->save();
       return redirect('/abm/empresa');
   }
   //Editar Empresa
   public function editarEmpresa($id){
       $empresa = Empresa::findOrFail($id);
       return view('pages.editar.editarEmpresa',compact('empresa'));
   }
   //Actualizar Empresa
   public function actualizarEmpresa(Request $form){
      $empresa = Empresa::findOrFail($form['id']);
      $empresa->denominacion = $form['denominacion'];
      $empresa->telefono = $form['telefono'];
      $empresa->hs_atencion = $form['horario'];
      $empresa->q_somos = $form['quienes_somos'];
      $empresa->latitud = $form['latitud'];
      $empresa->longitud = $form['longitud'];
      $empresa->domicilio = $form['domicilio'];
      $empresa->email = $form['email'];
      $empresa->update();
      return redirect('/abm/empresa');
   }

   //Borrar empresa
   public function borrarEmpresa($id){
       $empresa = Empresa::findOrFail($id);
       foreach ($empresa->noticias as $key => $noticias) {
         $noticias->delete();
       }
       $empresa->delete();
       return redirect('/abm/empresa')->with('message','ELIMINAR');
   }

   //ABM de Noticias
   public function listAllNoticias(){
       $noticias = Noticia::all();
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
       if(isset($form['imagen_noticia'])){
       $path = $form->file('imagen_noticia')->store('public/img/noticias');
       $archivo = basename($path);
       $noticia->img = $archivo;
       }
       $noticia->publicada = $form['publicar'];
       $noticia->fecha_publicacion = $form['fecha_publicacion'];
       $noticia->empresa_id = $form['empresa'];
       $noticia->update();
       return redirect('/abm/noticia');
   }
   //Borrar Noticia
   public function borrarNoticia($id){
       $noticia = Noticia::findOrFail($id);
       $noticia->empresa->delete();
       $notica->delete();
       return redire('/abm/notica')->with('message','ELIMINAR');
   }
}
