<?php

/**
 * @Author: fatoni
 * @Date:   2018-10-22 16:08:55
 * @Last Modified by:   fatoni
 * @Last Modified time: 2018-10-22 16:16:27
 */
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name'	=> $faker->colorName.' '.$faker->colorName,
        'price'	=> $faker->numberBetween($min = 1, $max = 9).'00000',
        'stock'	=> $faker->numberBetween($min = 20, $max = 50)
    ];
});