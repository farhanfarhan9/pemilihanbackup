<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Voter;
use Faker\Generator as Faker;

$factory->define(Voter::class, function (Faker $faker) {
    return [
        // 'organization_id' => factory('App\Organization'),
        'identity' => $faker->unique()->creditCardNumber,
        'name' => $faker->name(),
        'email' => $faker->unique()->safeEmail(),
        'phone_number' => $faker->unique()->phoneNumber(),
    ];
});
