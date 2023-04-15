<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttrGroupsSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Группа 1',
            ],
            [
                'name' => 'Группа 2',
            ],
            [
                'name' => 'Группа 3',
            ],
        ];

        \DB::table('attr_groups')->insert($groups);
    }
}
