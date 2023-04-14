<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttrItemDetailsSeeder extends Seeder
{
    public function run(): void
    {
        $details = [
            [
                'attr_item_variant_id' => 1,
                'attr_variant_value_id' => 1,
            ],
            [
                'attr_item_variant_id' => 1,
                'attr_variant_value_id' => 4,
            ],
            [
                'attr_item_variant_id' => 2,
                'attr_variant_value_id' => 1,
            ],
            [
                'attr_item_variant_id' => 2,
                'attr_variant_value_id' => 5,
            ],
        ];

        DB::table('attr_item_details')->insert($details);
    }
}
