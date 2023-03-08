<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactsSeeder extends Seeder
{
    public function run(Faker $faker): void
    {
        $message = [
            'title' => 'Контакты',
            'name' => 'Контакты',
            'slug' => 'contacts',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        DB::table('contacts')->insert($message);
    }
}
