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
                'value' => '<a href="tel:+8801234 567 890">+8801234 567 890</a>
								<a href="tel:+8801234 567 890">+8801234 567 890</a>',
            ],
            [
                'contact_id' => 1,
                'name' => 'Web',
                'type' => 'contacts',
                'key' => 'web',
                'value' => '<a href="mailto:info@example.com">info@example.com</a>
								<a href="mailto:www.example.com">www.example.com</a>',
            ],
            [
                'contact_id' => 1,
                'name' => 'Заголовок формы',
                'type' => 'contacts',
                'key' => 'form_title',
                'value' => 'Напишите нам!',
            ],
            [
                'contact_id' => 1,
                'name' => 'Комментарий к форме',
                'type' => 'contacts',
                'key' => 'form_brief',
                'value' => 'Не откладывай на завтра.',
            ],
        ];

        DB::table('contacts_properties')->insert($properties);
    }
}
