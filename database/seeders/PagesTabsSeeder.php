<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PagesTabsSeeder extends Seeder
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
        ];

        DB::table('pages_tabs')->insert($fields);
    }
}
