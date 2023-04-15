<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttrAtributesSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = [
            [
                'name' => 'Цвет',
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
