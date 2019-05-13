<?php

use App\Contact;
use Faker\Generator as Faker;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'full_name'      => $faker->firstName . ' ' . $faker->lastName,
        'email'          => $faker->unique()->safeEmail,
        'mobile'         => $faker->phoneNumber,
        'address_line_1' => $faker->randomNumber(2) . ' ' . $faker->streetName,
        'address_line_2' => 'Bellville',
        'city'           => 'Cape Town',
        'province'       => 'Western Cape',
        'postal_code'    => '7530',
    ];
});
