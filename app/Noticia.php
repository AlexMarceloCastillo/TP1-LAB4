<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Empresa;

class Noticia extends Model
{
    public $table = "noticias";

    public $guarded = [];


    /**
     * 'Trae' todos los reistros de empresas a través de la foreign Key 'empresa_id'
     */
    public function empresa(){
      return $this->belongsTo(Empresa::class,'empresa_id');
    }
}
