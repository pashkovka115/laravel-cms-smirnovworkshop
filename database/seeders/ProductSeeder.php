<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $count = 10;

        $products = [];
        for ($i = 1; $i <= $count; $i++) {
            $name = $faker->realText($faker->numberBetween(10, 30)) . "_$i";
            $product = [
                'category_id' => 1,
                'name' => $name,
                'slug' => Str::slug($name),
                'title' => $faker->realText($faker->numberBetween(10, 20)),
                'meta_keywords' => $faker->realText($faker->numberBetween(10, 20)),
                'meta_description' => $faker->realText($faker->numberBetween(20, 30)),
                'description' => $faker->realText($faker->numberBetween(50, 100)),
                'img' => $faker->imageUrl($width = 640, $height = 480),
                'created_at' => Carbon::now()
            ];
            $products[] = $product;
        }

        DB::table('products')->insert($products);
    }
}


