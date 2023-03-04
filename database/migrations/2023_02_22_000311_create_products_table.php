<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');

            $class = include 'templates/TemplateMetaFieldsMigration.php';
            $class::template($table)();

            $table->timestamps();


            $table->index(["category_id"], 'fk_category1_idx');

            $table->foreign('category_id', 'fk_category1_idx')
                ->references('id')->on('categories_product')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }


    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('fk_category1_idx');
        });
        Schema::dropIfExists('products');
    }
};
