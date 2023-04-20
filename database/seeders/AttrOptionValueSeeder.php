<?php

namespace Database\Seeders;

use App\Models\Attributes\Option;
use App\Models\Attributes\OptionValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AttrOptionValueSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $values = [];

        for ($i = 1; $i <= 10; $i++){
            $values[] = [
//                'title' => ucfirst(strtolower($faker->word())),
                'title' => "Значение $i опции",
                'option_id' => Option::query()->inRandomOrder()->value('id')
            ];
        }

        \DB::table('option_values')->insert($values);


        $pivot = [];

        for ($i = 1; $i <= 10; $i++){
            $pivot[] = [
                'product_id' => random_int(1, 2),
                'option_value_id' => OptionValue::query()->inRandomOrder()->value('id')
            ];
        }

        \DB::table('option_value_product')->insert($pivot);
    }
}
