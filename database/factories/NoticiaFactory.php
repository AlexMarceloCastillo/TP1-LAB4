<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Noticia;
use Faker\Generator as Faker;

$factory->define(Noticia::class, function (Faker $faker) {
    return [
        //
        "titulo"=>$faker->catchPhrase,
        "resumen"=>$faker->sentence(30),
        "img"=>$faker->imageUrl(640,480),
        "publicada"=>$faker->numberBetween(0,1),
        "contenido_html"=>$faker->randomHtml(2,3),
        "fecha_publicacion"=>now(),
        "empresa_id"=>$faker->numberBetween(1,10)
    ];
});
