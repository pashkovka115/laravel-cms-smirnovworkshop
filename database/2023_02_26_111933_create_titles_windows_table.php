<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('titles_windows', function (Blueprint $table) {
            $table->id();
            $table->string('table_name');
            $table->integer('sort')->default(100);

            $table->string('id_column')->nullable();
            $table->string('title_column')->nullable();
            $table->string('meta_keywords_column')->nullable();
            $table->string('meta_description_column')->nullable();
            $table->string('name_lavel_column')->default('h1')->comment('Название колонки');

            $table->string('name_column');
            $table->string('slug_column');
            $table->string('img_column')->nullable();
            $table->string('description_column')->nullable();
            $table->string('created_at_column')->nullable();
            $table->string('updated_at_column')->nullable();
            $table->string('actions_column')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titles_windows');
    }
};
