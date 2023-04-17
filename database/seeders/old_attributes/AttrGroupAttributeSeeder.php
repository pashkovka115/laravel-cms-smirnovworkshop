<?php


use Illuminate\Database\Seeder;

class AttrGroupAttributeSeeder extends Seeder
{
    public function run(): void
    {
        $igs = [
            [
                'group_id' => 1,
                'attribute_id' => 1,
                'item_id' => 1
            ],
            [
                'group_id' => 1,
                'attribute_id' => 2,
                'item_id' => 1
            ],
            [
                'group_id' => 2,
                'attribute_id' => 3,
                'item_id' => 1
            ],
            [
                'group_id' => 2,
                'attribute_id' => 4,
                'item_id' => 1
            ],
        ];

        \DB::table('attr_group_attribute')->insert($igs);
    }
}
