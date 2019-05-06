<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Election;
use Faker\Generator as Faker;

$factory->define(Election::class, function (Faker $faker) {
    return [
        'organization_id' => factory('App\Organization'),
        'name' => $faker->sentence(5),
        'registration_opened_on' => $faker->dateTimeBetween('now', '+1 day'),
        'registration_closed_on' => $faker->dateTimeBetween('now', '+2 days'),
        'voting_starts_on' => $faker->dateTimeBetween('now', '+3 days'),
        'voting_ends_on' => $faker->dateTimeBetween('now', '+4 days'),
    ];
});
