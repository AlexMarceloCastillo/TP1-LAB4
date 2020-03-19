<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresa;

use App\Noticia;

class EmpresaController extends Controller
{
    /**
     * Lista todas las empresas de la BD
     */
    public function listAllEmp(){
        $empresas = Empresa::all();
        return view('index',compact('empresas'));
    }

    /**
     * Redirecciona a la 'página' de la empresa solicitada
     */
    public function homeEmp($id){
        $empresa = Empresa::find($id);
        $noticias = Noticia::latest()->take(5)->get();
        $vac = compact('empresa','noticias');
        return view('pages.home',$vac);
    }
}
