<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [ // 1
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => 'Item 1',
                'slug' => 'item-1',
            ],
            [ // 2
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => 'Item 2',
                'slug' => 'item-2',
            ],
            [ // 3
                'parent_id' => 2,
                'menu_id' => 1,
                'name' => 'Item 2.1',
                'slug' => 'item-2-1',
            ],
            [ // 4
                'parent_id' => 2,
                'menu_id' => 1,
                'name' => 'Item 2.2',
                'slug' => 'item-2-2',
            ],
            [ // 5
                'parent_id' => 3,
                'menu_id' => 1,
                'name' => 'Item 2.1.1',
                'slug' => 'item-2-1-1',
            ],
            [ // 6
                'parent_id' => 5,
                'menu_id' => 1,
                'name' => 'Item 2.1.1.1',
                'slug' => 'item-2-1-1-1',
            ],
            [ // 7
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => 'Item 3',
                'slug' => 'item-3',
            ],
            [ // 8
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => 'Item 4',
                'slug' => 'item-4',
            ],
            [ // 9
                'parent_id' => 0,
                'menu_id' => 1,
                'name' => 'Item 5',
                'slug' => 'item-5',
            ],
        ];

        \DB::table('menuitem')->insert($items);
    }
}
