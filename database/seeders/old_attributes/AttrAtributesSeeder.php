<?php


use Illuminate\Database\Seeder;

class AttrAtributesSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = [
            [
                'name' => 'Цвет фона',
            ],
            [
                'name' => 'Главный цвет',
            ],
            [
                'name' => 'Материал',
            ],
            [
                'name' => 'Размер',
            ],
        ];

        \DB::table('attr_atributes')->insert($attributes);
    }
}
