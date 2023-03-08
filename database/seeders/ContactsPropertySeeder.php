<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactsPropertySeeder extends Seeder
{
    public function run(): void
    {
        $properties = [
            [
                'contact_id' => 1,
                'name' => 'Адрес',
                'type' => 'contacts',
                'key' => 'address',
                'value' => 'Краснодарский край, Краснодар...',
            ],
            [
                'contact_id' => 1,
                'name' => 'Телефон',
                'type' => 'contacts',
                'key' => 'phone',
                'value' => '+7928000000',
            ],
        ];

        DB::table('contacts_properties')->insert($properties);
    }
}
