<?php

/**
 * @Author: fatoni
 * @Date:   2018-10-22 15:58:54
 * @Last Modified by:   fatoni
 * @Last Modified time: 2018-10-22 16:12:14
 */
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->colorName
    ];
});