<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Posts;
use Faker\Generator as Faker;

$factory->define(Posts::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'text' => $faker->text,
        'status'=> rand(0,1)
    ];
});
