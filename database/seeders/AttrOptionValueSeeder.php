<?php

namespace Database\Seeders;

use App\Models\Product\Attributes\Option;
use App\Models\Product\Attributes\OptionValue;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class AttrOptionValueSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $values = [];

        for ($i = 1; $i <= 10; $i++){
            $option_id = Option::query()->inRandomOrder()->value('id');
            $values[] = [
//                'title' => ucfirst(strtolower($faker->word())),
                'title' => "Значение $i опции $option_id",
                'option_id' => $option_id
            ];
        }

        \DB::table('attr_option_values')->insert($values);


        $pivot = [];

        for ($i = 1; $i <= 10; $i++){
            $pivot[] = [
                'product_id' => random_int(1, 2),
                'option_value_id' => OptionValue::query()->inRandomOrder()->value('id')
            ];
        }

        \DB::table('attr_option_value_product')->insert($pivot);
    }
}