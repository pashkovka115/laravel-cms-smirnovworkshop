<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesProductColumnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            [
                'origin_name' => 'id',
                'show_name' => 'ID',
                'sort' => 500,
                'is_show_anons' => 1,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'name',
                'show_name' => 'Заголовок страницы',
                'sort' => 500,
                'is_show_anons' => 1,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'slug',
                'show_name' => 'Алиас',
                'sort' => 500,
                'is_show_anons' => 1,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'title',
                'show_name' => 'Заголовок окна',
                'sort' => 500,
                'is_show_anons' => 0,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'meta_keywords',
                'show_name' => 'meta keywords',
                'sort' => 500,
                'is_show_anons' => 0,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'meta_description',
                'show_name' => 'meta description',
                'sort' => 500,
                'is_show_anons' => 0,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'name_lavel',
                'show_name' => 'Уровень заголовка',
                'sort' => 500,
                'is_show_anons' => 0,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'img',
                'show_name' => 'Изображение',
                'sort' => 500,
                'is_show_anons' => 1,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'anons',
                'show_name' => 'Анонс',
                'sort' => 500,
                'is_show_anons' => 1,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'description',
                'show_name' => 'Описание',
                'sort' => 500,
                'is_show_anons' => 0,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'created_at',
                'show_name' => 'Время создания',
                'sort' => 500,
                'is_show_anons' => 1,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'updated_at',
                'show_name' => 'Время обновления',
                'sort' => 500,
                'is_show_anons' => 1,
                'is_show_single' => 1,
            ],
            [
                'origin_name' => 'actions_column',
                'show_name' => 'Действия',
                'sort' => 500,
                'is_show_anons' => 1,
                'is_show_single' => 1,
            ],
        ];

        DB::table('categories_product_columns')->insert($fields);
    }
}
