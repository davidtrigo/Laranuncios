<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Anuncio;
use Faker\Generator as Faker;

$factory->define(Anuncio::class, function (Faker $faker) {
    return [
        'titulo'=>$faker->company,
        'descripcion'=>$faker->text(255),
        'precio'=>$faker->randomFloat(2,1,20000)
        
        
    ];
});
