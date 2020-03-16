<?php

namespace App\Http\Controllers;

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
       $empresa->hs_atencion = $form['horarios'];
       $empresa->q_somos = $form['quienes_somos'];
       $empresa->latitud = $form['latitud'];
       $empresa->longitud = $form['longitud'];
       $empresa->domicilio = $form['domicilio'];
       $empresa->email = $form['email'];
       $empresa->save();
       return redirect('/abm/empresa');
   }

   //Borrar empresa
   public function borrarEmpresa($id){
       $empresa = Empresa::findOrFail($id);
       foreach ($empresa->noticias as $key => $noticias) {
         // code...
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
       $notica->img = $nombreArchivo;
       $noticia->publicada = $form['publicar'];
       $noticia->fecha_publicacion = $form['fecha_publicacion'];
       $noticia->empresa_id = $form['empresa'];
       $noticia->save();
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
