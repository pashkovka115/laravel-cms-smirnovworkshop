<?php


use Illuminate\Database\Seeder;

class AttrValuesSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            [
                'name' => 'red',
            ],
            [
                'name' => 'blue',
            ],
            [
                'name' => 'green',
            ],
            [
                'name' => 'wool',
            ],
            [
                'name' => 'polyester',
            ],
            [
                'name' => 'small',
            ],
            [
                'name' => 'medium',
            ],
            [
                'name' => 'large',
            ],
        ];

        \DB::table('attr_values')->insert($values);
    }
}
