<?php


use Illuminate\Database\Seeder;

class AttrAttributesValuesSeeder extends Seeder
{
    public function run(): void
    {
        $igs = [
            [
                'value_id' => 1,
                'attribute_id' => 1,
                'item_id' => 1
            ],
            [
                'value_id' => 2,
                'attribute_id' => 1,
                'item_id' => 1
            ],
            [
                'value_id' => 3,
                'attribute_id' => 1,
                'item_id' => 1
            ],
            [
                'value_id' => 4,
                'attribute_id' => 2,
                'item_id' => 1
            ],
            [
                'value_id' => 5,
                'attribute_id' => 2,
                'item_id' => 1
            ],
            [
                'value_id' => 6,
                'attribute_id' => 3,
                'item_id' => 1
            ],
            [
                'value_id' => 7,
                'attribute_id' => 3,
                'item_id' => 1
            ],
            [
                'value_id' => 8,
                'attribute_id' => 3,
                'item_id' => 1
            ],
        ];

        \DB::table('attr_atributes_values')->insert($igs);
    }
}
