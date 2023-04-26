<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class AttrOptionSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $options = [];

        for ($i = 1; $i <= 2; $i++){
            $options[] = [
                'name' => "Опция $i",
            ];
        }

        \DB::table('attr_options')->insert($options);
    }
}
