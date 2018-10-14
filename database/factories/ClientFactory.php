<?php

use Faker\Generator as Faker;

$factory->define(App\Clients::class, function (Faker $faker) {
    return [
        'name' => 'Client Name',
        'email' => 'client@app.com',
        'cin' => '12345678',
        'phone' => '1234567891',
        'address' => '123 Main St',
        'city' => 'Los Angeles',
        'status' => 1,
    ];
});
