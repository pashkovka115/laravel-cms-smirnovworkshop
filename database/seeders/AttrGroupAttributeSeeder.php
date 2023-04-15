<?php

namespace Database\Seeders;

use App\Models\Product\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttrGroupAttributeSeeder extends Seeder
{
    public function run(): void
    {
        $igs = [
            [
                'group_id' => 1,
                'attribute_id' => 1,
            ],
            [
                'group_id' => 1,
                'attribute_id' => 2,
            ],
            [
                'group_id' => 1,
                'attribute_id' => 3,
            ],
            [
                'group_id' => 2,
                'attribute_id' => 1,
            ],
            [
                'group_id' => 2,
                'attribute_id' => 2,
            ],
            [
                'group_id' => 2,
                'attribute_id' => 3,
            ],
        ];

        \DB::table('attr_group_attribute')->insert($igs);
    }
}
