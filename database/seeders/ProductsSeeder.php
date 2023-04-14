<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProductsSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $count = 10;

        $products = [];

        $product1 = [
            'name' => 'Ковёр',
            'slug' => Str::slug('Ковёр'),
            'description' => 'Классный ковер',
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $product2 = [
            'name' => 'Чашка',
            'slug' => Str::slug('Чашка'),
            'description' => 'Кофейная чашка',
            'category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $class = include 'templates/TemplateMetaSeeder.php';
        $template = $class::template($faker)();

        $products[] = array_merge($template, $product1);
        $products[] = array_merge($template, $product2);


        for ($i = 1; $i <= $count; $i++){

            $product = [
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $class = include 'templates/TemplateMetaSeeder.php';
            $template = $class::template($faker)();

            $products[] = $product + $template;
        }

        DB::table('products')->insert($products);
    }
}
