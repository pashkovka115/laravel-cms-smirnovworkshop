<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories_product_property', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            /*$table->string('key');
            $table->string('type')->nullable();
            $table->longText('value')->nullable();*/

            $class = include "templates/TemplateProperties.php";
            $class::template($table)();

            $table->index(["category_id"], 'fk_category_property2_idx');

            $table->foreign('category_id', 'fk_category_property2_idx')
                ->references('id')->on('categories_product')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->unique(['category_id', 'key']);
        });
    }


    public function down(): void
    {
        Schema::table('categories_product_property', function (Blueprint $table) {
            $table->dropForeign('fk_category_property2_idx');
        });
        Schema::dropIfExists('categories_product_property');
    }
};
