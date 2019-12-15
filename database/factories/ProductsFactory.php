<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Products;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Products::class, function (Faker $faker) {
    return [
        'product_name' => $faker->name, 
        'product_desc' => 'Lorem ipsum', 
        'product_max_db' => $faker->numberBetween(100,2000), 
        'product_status' => 'Valid',
    ];
});
