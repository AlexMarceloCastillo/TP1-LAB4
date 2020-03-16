<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Noticia;

/**
 * Modelo de la tabla empresa
 */
class Empresa extends Model
{
    public $table = "empresas";

    public $guarded = [];

    public function noticias(){
      return $this->hasMany(Noticia::class,'empresa_id');
    }
}
