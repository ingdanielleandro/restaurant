<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Principio;
use Faker\Generator as Faker;

$factory->define(Principio::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
