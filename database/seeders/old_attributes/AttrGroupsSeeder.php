<?php


use Illuminate\Database\Seeder;

class AttrGroupsSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            [
                'name' => 'Дизайн',
            ],
            [
                'name' => 'Шины',
            ],
            [
                'name' => 'Пустая группа',
            ],
        ];

        \DB::table('attr_groups')->insert($groups);
    }
}
