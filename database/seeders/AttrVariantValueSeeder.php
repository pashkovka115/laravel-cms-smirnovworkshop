<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttrVariantValueSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            [
                'variant_id' => 1,
                'value' => 'красный',
            ],
            [
                'variant_id' => 1,
                'value' => 'синий',
            ],
            [
                'variant_id' => 1,
                'value' => 'зелёный',
            ],
            [
                'variant_id' => 2,
                'value' => 'шерсть',
            ],
            [
                'variant_id' => 2,
                'value' => 'полиэстер',
            ],
            [
                'variant_id' => 3,
                'value' => 'маленький',
            ],
            [
                'variant_id' => 3,
                'value' => 'средний',
            ],
            [
                'variant_id' => 3,
                'value' => 'большой',
            ],
        ];

        DB::table('attr_variant_value')->insert($values);
    }
}
