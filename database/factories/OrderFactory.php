<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'customer_id' => $faker->customerId,
        'description' => $faker->description,
        'cost' => $faker->cost,
    ];
});
