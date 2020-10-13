<?php

use Faker\Generator as Faker;

$factory->define(App\Rss::class, function (Faker $faker) {
    return [
        'url' => $faker->url()
    ];
});
