<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTabsSeeder extends Seeder
{
    public function run(): void
    {
        $fields = [
            [
                'name' => 'Общее',
            ],
            [
                'name' => 'Свойства',
            ],
            [
                'name' => 'Третий таб',
            ],
        ];

        DB::table('products_tabs')->insert($fields);
    }
}
