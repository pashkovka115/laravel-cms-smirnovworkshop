<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductPropertySeeder extends Seeder
{
    public function run(): void
    {
        $count = 5;

        $properties = [];
        for ($i = 1; $i <= $count; $i++){
            $property = [
                'product_id' => 1,
                'key' => Str::slug("key $i"),
                'value' => "value $i",
                'name' => "Name $i",
                'description' => "Description $i Lorem ipsum dolor sit amet, consectetur adipisicing elit. ",
                'created_at' => Carbon::now()
            ];

            $properties[] = $property;
        }

        DB::table('product_properties')->insert($properties);
    }
}
