<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Proteina;
use Faker\Generator as Faker;

$factory->define(Proteina::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->title,
    ];
});
