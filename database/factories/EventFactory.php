<?php

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $publishedAt = $faker->dateTimeBetween('-2 years', '+1 year');

    $amountOfMonths = $faker->numberBetween(1, 3);
    $startsAt = (clone $publishedAt)->add(new DateInterval("P{$amountOfMonths}M"));

    $amountOfDays = $faker->numberBetween(1, 3);
    $endsAt = (clone $startsAt)->add(new DateInterval("P{$amountOfDays}D"));

    return [
        'name' => $faker->word . 'Conf',
        'description' => $faker->paragraphs(3, true),
        'location'=> $faker->word,
        'city' => $faker->city,
        'country' => $faker->country,
        'website' => $faker->url,
        'published_at' => $publishedAt,
        'starts_at' => $startsAt,
        'ends_at' => $endsAt,
    ];
});

$factory->state(Event::class, 'unpublished', [
    'published_at' => null,
]);
