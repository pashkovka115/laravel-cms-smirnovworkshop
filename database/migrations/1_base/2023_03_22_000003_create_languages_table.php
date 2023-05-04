<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->boolean('base')->default(false);
            $table->boolean('is_active')->default(false);
        });


        $languages = [
            [
                'name' => 'Русский',
                'code' => 'ru',
                'base' => 1,
                'is_active' => 1,
            ],
            [
                'name' => 'English',
                'code' => 'en',
                'base' => 0,
                'is_active' => 1,
            ],
        ];

        DB::table('languages')->insert($languages);
    }


    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
