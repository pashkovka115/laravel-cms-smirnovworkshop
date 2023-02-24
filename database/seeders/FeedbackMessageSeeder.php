<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackMessageSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $count = 5;
        $messages = [];
        for ($i = 1; $i <= $count; $i++){
            $message = [
                'user_id' => $i === 1 ? 1 : null,
                'message' => $faker->realText(),
                'created_at' => Carbon::now()
            ];

            $messages[] = $message;
        }

        DB::table('feedback_messages')->insert($messages);
    }
}
