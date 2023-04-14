<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsColumnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $class = include 'templates/TemplateTableColumnsSeeder.php';
        $fields = $class::template()();
        $fields[] = [
            'origin_name' => 'category_id',
            'show_name' => 'Категория',
            'sort_list' => 10,
            'sort_single' => 10,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'select.all_categories',
            'tab_id' => 1
        ];

        DB::table('products_columns')->insert($fields);
    }
}
