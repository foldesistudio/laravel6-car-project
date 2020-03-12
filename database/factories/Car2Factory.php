<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car2;
use App\User;
use Faker\Generator as Faker;

$factory->define(Car2::class, function (Faker $faker) {
    return [
        'brand' => $faker->randomElement(['Abarth','Aston Martin','Audi','Citroen','Honda','Jaguar','Mazda','Nissan','Porsche','Toyota','Volvo']),
        'year' => $faker->year,
        'km' => $faker->numberBetween('0','1000000'),
        'licence_plate' => $faker->regexify('([a-z]{3}-[0-9]{3})'),
        'status' => $faker->boolean,
        'user_id' => factory(User::class)->create()->id,
    ];
});
