<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsPropertySeeder extends Seeder
{
    public function run(): void
    {
        $properties = [];

        for ($i = 1; $i <= 5; $i++){
            $properties[] = [
                'product_id' => 1,
                'type' => 'type' . $i,
                'key' => 'Key' . $i,
                'value' => 'Value' . $i,
            ];
        }

        DB::table('product_properties')->insert($properties);
    }
}
