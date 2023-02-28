<?php


return new class
{
    /**
     * Шаблон для заполнения таблиц с постфиксом "Columns"
     * (Заполнение мета-таблиц)
     */
    public static function template(): Closure
    {
        $func = function (){
            $fields = [
                [
                    'origin_name' => 'id',
                    'show_name' => 'ID',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 1,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'name',
                    'show_name' => 'Заголовок страницы',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 1,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'slug',
                    'show_name' => 'Алиас',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 1,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'title',
                    'show_name' => 'Заголовок окна',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 0,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'meta_keywords',
                    'show_name' => 'meta keywords',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 0,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'meta_description',
                    'show_name' => 'meta description',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 0,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'name_lavel',
                    'show_name' => 'Уровень заголовка',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 0,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'img_announce',
                    'show_name' => 'Изображение в анонсе',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 0,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'img_detail',
                    'show_name' => 'Изображение в детальном описании',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 0,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'announce',
                    'show_name' => 'Анонс',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 1,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'description',
                    'show_name' => 'Описание',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 0,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'created_at',
                    'show_name' => 'Время создания',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 1,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'updated_at',
                    'show_name' => 'Время обновления',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 0,
                    'is_show_single' => 1,
                ],
                [
                    'origin_name' => 'actions_column',
                    'show_name' => 'Действия',
                    'sort_list' => 500,
                    'sort_single' => 500,
                    'is_show_anons' => 1,
                    'is_show_single' => 0,
                ],
            ];

            return $fields;
        };

        return $func;
    }
};