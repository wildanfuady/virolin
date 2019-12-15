<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subscribers;
use Faker\Generator as Faker;

$factory->define(Subscribers::class, function (Faker $faker) {
    return [
        'subscriber_name' => $faker->name,
        'subscriber_email' => $faker->email,
        'subscriber_nohp' => $faker->phoneNumber,
        'subscriber_alamat' => $faker->address,
        'subscriber_verifikasi' => $faker->name,
        'subscriber_status' => 'valid',
        'user_id' => function(){
            return \App\User::all()->random();
        },
        'lp_id' => '1',
    ];
});