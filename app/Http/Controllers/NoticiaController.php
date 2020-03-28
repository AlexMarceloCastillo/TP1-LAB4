<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Noticia;


class NoticiaController extends Controller
{
    public function busqueda(Request $form){
        $busqueda=$form["busqueda"];
        $empresa=session('actual');
        $noticias=Noticia::latest()->take(20)->where('empresa_id',$empresa->id)
        ->where(function($query)use ($busqueda){
            $query->where('titulo','like','%'.$busqueda.'%')
            ->orWhere('resumen','like','%'.$busqueda.'%');})
            ->orderBy('id','desc')->paginate(1);
        $vac=compact('empresa','noticias','busqueda');
        return view('pages.paginas.busqueda',$vac);

    }
}
