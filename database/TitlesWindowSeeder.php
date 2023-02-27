<?php


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TitlesWindowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [];

        $title = [
            'id_column' => 'ID',
            'sort' => 100,
            'name_column' => 'Заголовок страницы',
            'slug_column' => 'Алиас',
            'title_column' => 'Заголовок окна',
            'meta_keywords_column' => 'meta keywords',
            'meta_description_column' => 'meta_description',
            'name_lavel_column' => 'Уровень заголовка',
            'img_column' => 'Изображение',
            'description_column' => 'Описание',
            'created_at_column' => 'Время создания',
            'updated_at_column' => 'Время обновления',
            'actions_column' => 'Действия'
        ];

        $titles[] = $title + ['table_name' => 'categories_product',];
        $titles[] = $title + ['table_name' => 'products',];

        DB::table('titles_windows')->insert($titles);
    }
}
