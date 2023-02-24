<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryProductsSeeder extends Seeder
{
    public function run(): void
    {
        $count = 5;

        $categories = [];
        for ($i = 1; $i <= $count; $i++){
            $name = "Категория $i";
            $category = [
                'name' => $name,
                'slug' => Str::slug($name)
            ];

            $categories[] = $category;
        }

        DB::table('categories_product')->insert($categories);
    }
}
