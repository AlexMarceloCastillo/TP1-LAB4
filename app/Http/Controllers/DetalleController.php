<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Noticia;

class DetalleController extends Controller
{
    //

    public function detalleNoticia($id){
      $noticia = Noticia::findOrFail($id);
      return view('pages.detalle',compact('noticia'));
    }
}
