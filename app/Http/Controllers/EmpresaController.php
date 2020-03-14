<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresa;


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
    public function homeEmp(Request $id){
        $empresa = Empresa::where('id','=',$id)->get();
        return view('pages.home',compact('empresa'));
    }
}
