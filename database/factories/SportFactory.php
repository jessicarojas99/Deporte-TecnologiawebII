<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Sport;
use Faker\Generator as Faker;

$factory->define(Sport::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique()->randomElement(['Futbol','Natacion','Volleyball','Basketball','Boxeo','Atletismo','Gimnasia','Ciclismo','Ajedrez','Raquetball']),
        'modality'=>$faker->randomElement(['Parejas','individual','conjunto']),
        'description'=>$faker->sentence(3),
    ];
});
