<?php

use Faker\Generator as Faker;

$factory->define(App\Retrievers\Posts::class, function (Faker $faker) {
    return [

        'title'     => $faker->sentence(5),
        'body'   => $faker->paragraph(4),];

});
