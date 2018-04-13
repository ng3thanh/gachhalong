<?php
use App\Models\Image;
use App\Models\Menu;
use App\Models\Product;
use Faker\Generator as Faker;

/*
 * |--------------------------------------------------------------------------
 * | Model Factories
 * |--------------------------------------------------------------------------
 * |
 * | This directory should contain each of the model factory definitions for
 * | your application. Factories provide a convenient way to generate new
 * | model instances for testing / seeding your application's database.
 * |
 */

$factory->define(Menu::class, function (Faker $faker) {
    $name = $faker->unique()->name;
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->realText(255, 3),
        'parent_id' => $faker->numberBetween(0,3),
    ];
});

$factory->define(Product::class, function (Faker $faker) {
    $start = $faker->dateTimeThisYear;
    $end = $faker->dateTimeBetween($start, strtotime('+12 weeks'));
    $name = $faker->unique()->name;
    
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->paragraph,
        'star' => $faker->randomFloat(2, 0, 5),
        'vote' => $faker->numberBetween(1, 500),
        'digital' => $faker->text,
        'information' => $faker->text
    ];
});

$factory->define(Image::class, function (Faker $faker) {
    return [
        'name' => $faker->imageUrl($width = 200, $height = 200),
        'alt' => $faker->sentence,
        'is_main_image' => $faker->numberBetween(0,1),
    ];
});