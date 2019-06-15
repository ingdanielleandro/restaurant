<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Sopa;
use Faker\Generator as Faker;

$factory->define(Sopa::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
