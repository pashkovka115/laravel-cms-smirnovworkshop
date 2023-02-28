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
        Schema::create('products_columns', function (Blueprint $table) {
            /*$table->id();
            $table->string('origin_name');
            $table->string('show_name');
            $table->integer('sort');
            $table->boolean('is_show_anons');
            $table->boolean('is_show_single');*/

            $class = include 'templates/TemplateColumnTableMigration.php';
            $class::template($table)();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_columns');
    }
};
