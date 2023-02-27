<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories_product', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('name_lavel', 2)->default('h1');

            $table->string('name');
            $table->string('slug');
            $table->string('img')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('categories_product');
    }
};
