<?php

namespace Database\Seeders;

use App\Models\Attributes\Option;
use App\Models\Attributes\OptionValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AttrOptionSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $options = [];

        for ($i = 1; $i <= 2; $i++){
            $options[] = [
                'title' => ucfirst(strtolower($faker->word())),
            ];
        }

        \DB::table('options')->insert($options);
    }
}
