<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tabs = [
            [
                'name' => 'Общее',
            ],
            [
                'name' => 'Связи',
            ],
            [
                'name' => 'Номера товара',
            ],
        ];

        DB::table('products_tabs')->insert($tabs);


        $class = include base_path('database/seeders/templates/TemplateTableColumnsSeeder.php');
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
        $fields[] = [
            'origin_name' => 'properties',
            'show_name' => 'Свойства с одним значением',
            'sort_list' => 10,
            'sort_single' => 1,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'properties',
            'tab_id' => 2
        ];
        $fields[] = [
            'origin_name' => 'options',
            'show_name' => 'Опции с множественными значениями',
            'sort_list' => 10,
            'sort_single' => 1,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'options',
            'tab_id' => 2
        ];
        $fields[] = [
            'origin_name' => 'sku',
            'show_name' => 'Артикул',
            'sort_list' => 10,
            'sort_single' => 1,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 3
        ];
        $fields[] = [
            'origin_name' => 'upc',
            'show_name' => 'UPC',
            'sort_list' => 10,
            'sort_single' => 1,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 3
        ];
        $fields[] = [
            'origin_name' => 'ean',
            'show_name' => 'EAN',
            'sort_list' => 10,
            'sort_single' => 1,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 3
        ];
        $fields[] = [
            'origin_name' => 'jan',
            'show_name' => 'JAN',
            'sort_list' => 10,
            'sort_single' => 1,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 3
        ];
        $fields[] = [
            'origin_name' => 'isbn',
            'show_name' => 'ISBN',
            'sort_list' => 10,
            'sort_single' => 1,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 3
        ];
        $fields[] = [
            'origin_name' => 'mpn',
            'show_name' => 'MPN',
            'sort_list' => 10,
            'sort_single' => 1,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'string',
            'tab_id' => 3
        ];
        $fields[] = [
            'origin_name' => 'parent_id',
            'show_name' => 'Сделать вариантом этого товара',
            'sort_list' => 10,
            'sort_single' => 1,
            'is_show_anons' => 0,
            'is_show_single' => 1,
            'type' => 'select.parent',
            'tab_id' => 1
        ];

        DB::table('products_columns')->insert($fields);

    }


    public function down(): void
    {
        DB::table('products_columns')->truncate();
    }
};
