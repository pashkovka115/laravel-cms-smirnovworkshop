<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageColumnsSeeder extends Seeder
{
    public function run(): void
    {
        $class = include 'templates/TemplateTableColumnsSeeder.php';
        $fields = $class::template()();

        DB::table('page_columns')->insert($fields);
    }
}
