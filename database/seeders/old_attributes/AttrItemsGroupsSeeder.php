<?php


use App\Models\Product\Product;
use Illuminate\Database\Seeder;

class AttrItemsGroupsSeeder extends Seeder
{
    public function run(): void
    {
        $igs = [
            // id 1
            [
                'item_id' => 1,
                'group_id' => 1,
                'item_model' => Product::class,
            ],
            [
                'item_id' => 1,
                'group_id' => 2,
                'item_model' => Product::class,
            ],
            [
                'item_id' => 1,
                'group_id' => 3,
                'item_model' => Product::class,
            ],
            // id 2
            [
                'item_id' => 2,
                'group_id' => 1,
                'item_model' => Product::class,
            ],
            [
                'item_id' => 2,
                'group_id' => 2,
                'item_model' => Product::class,
            ],
        ];

        \DB::table('attr_items_groups')->insert($igs);
    }
}
