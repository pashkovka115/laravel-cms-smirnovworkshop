<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Support\Str;


/**
 * Используется как шаблон для заполнения одинаковых полей в таблицах
 */
return new class {
    public static function template(Faker $faker): \Closure
    {
        $func = function () use ($faker){
            $name = $faker->realText($faker->numberBetween(10, 20));

            return [
                'title' => $faker->realText($faker->numberBetween(10, 30)),
                'meta_keywords' => $faker->realText($faker->numberBetween(10, 30)),
                'meta_description' => $faker->realText($faker->numberBetween(50, 100)),
                'name_lavel' => 'h1',
                'name' => $name,
                'slug' => Str::slug($name),
                'img_announce' => '',
                'img_detail' => '',
                'announce' => $faker->realText($faker->numberBetween(30, 50)),
                'description' => $faker->realText($faker->numberBetween(100, 200)),
            ];
        };

        return $func;
    }
};
