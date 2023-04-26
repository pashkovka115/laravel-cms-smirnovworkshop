<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AttrPropertiesSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $properties = [];

        for ($i = 1; $i <= 10; $i++){
            $properties[] = [
                'name' => "Свойство $i"
            ];
        }

        \DB::table('attr_properties')->insert($properties);


        $pivot = [];

        for ($i = 1; $i <= 10; $i++){
            $property_id = random_int(1, count($properties));
            $pivot[] = [
                'product_id' => 1,
                'property_id' => $property_id,
                'value' => "Значение $i свойства $property_id"
            ];
        }

        \DB::table('attr_product_property')->insert($pivot);
    }
}
