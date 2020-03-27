<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        //
        "denominacion"=> $faker->company,
        "telefono"=>$faker->tollFreePhoneNumber,
        "hs_atencion"=>$faker->numberBetween(0,23)." a ".$faker->numberBetween(0,23),
        "q_somos" => $faker->sentence(30),
        "latitud" =>$faker->latitude,
        "longitud" =>$faker->longitude,
        "domicilio" =>$faker->address,
        "email"=> $faker->unique()->companyEmail

    ];
});
