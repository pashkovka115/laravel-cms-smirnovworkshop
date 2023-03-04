<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_properties', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            /*$table->string('key');
            $table->string('type')->nullable();
            $table->longText('value')->nullable();*/

            $class = include "templates/TemplateProperties.php";
            $class::template($table)();

            $table->index(["product_id"], 'fk_product_property2_idx');

            $table->foreign('product_id', 'fk_product_property2_idx')
                ->references('id')->on('products')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->unique(['product_id', 'key']);
        });
    }


    public function down(): void
    {
        Schema::table('product_properties', function (Blueprint $table) {
            $table->dropForeign('fk_product_property2_idx');
        });
        Schema::dropIfExists('product_properties');
    }
};
