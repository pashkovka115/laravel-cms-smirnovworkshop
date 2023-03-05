<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeedbackSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $count = 5;
        $messages = [];
        for ($i = 1; $i <= $count; $i++){
            $message = [
                'user_id' => $i === 1 ? 1 : null,
                'name' => 'Тема ' . $i,
                'slug' => Str::slug('Тема ' . $i),
                'message' => $faker->realText(),
                'checked' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $messages[] = $message;
        }

        DB::table('feedback')->insert($messages);
    }
}