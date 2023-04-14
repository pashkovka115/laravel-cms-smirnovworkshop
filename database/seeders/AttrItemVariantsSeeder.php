<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttrItemVariantsSeeder extends Seeder
{
    public function run(): void
    {
        $variants = [
            [
                'item_id' => 1,
                'variant_name' => 'Ковёр красный шерстяной',
                'sku' => 'a121',
                'price' => 50,
            ],
            [
                'item_id' => 1,
                'variant_name' => 'Ковёр красный полиэстеровый',
                'sku' => 'a122',
                'price' => 50,
            ],
        ];

        DB::table('attr_item_variants')->insert($variants);
    }
}
