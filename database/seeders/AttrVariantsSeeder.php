<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttrVariantsSeeder extends Seeder
{
    public function run(): void
    {
        $variants = [
            [
                'variant' => 'Цвет',
            ],
            [
                'variant' => 'Материал',
            ],
            [
                'variant' => 'Размер',
            ],
        ];

        DB::table('attr_variants')->insert($variants);
    }
}
