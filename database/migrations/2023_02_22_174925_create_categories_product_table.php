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

            $class = include 'templates/TemplateMetaFieldsMigration.php';
            $class::meta_template_for_up($table)();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('categories_product');
    }
};
