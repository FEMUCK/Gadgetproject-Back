<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use App\Banner;

$factory->define(Banner::class, function (Faker $faker) {
    return [
        'image' => null,
        'name' => $faker->name,   
        'link' => null,
        'arrange' => null,
    ];
});
