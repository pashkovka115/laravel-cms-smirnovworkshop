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
        Schema::create('categories_product_columns', function (Blueprint $table) {
            $table->id();
            $table->string('origin_name');
            $table->string('show_name');
            $table->integer('sort');
            $table->boolean('is_show_anons');
            $table->boolean('is_show_single');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_product_columns');
    }
};
