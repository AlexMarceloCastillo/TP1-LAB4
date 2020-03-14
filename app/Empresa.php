<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * Modelo de la tabla empresa
 */
class Empresa extends Model
{
    public $table = "empresas";

    public $guarded = [];

    
    public function empresas(){
        return $this->belongsTo('App\Noticia');
    }
}
