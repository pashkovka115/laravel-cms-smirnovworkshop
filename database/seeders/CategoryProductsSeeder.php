<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class CategoryProductsSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $count = 5;

        $categories = [];
        for ($i = 1; $i <= $count; $i++){
            $name = "Категория $i";
            $category = [
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $class = include 'templates/TemplateMetaSeeder.php';
            $template = $class::template($faker)();

            $categories[] = $category + $template;
        }

        DB::table('categories_product')->insert($categories);
    }
}
