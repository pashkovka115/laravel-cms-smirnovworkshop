<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attr_item_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->string('variant_name');
            $table->string('sku');
            $table->float('price');



            /*$table->index(["category_id"], 'fk_category1_idx');

            $table->foreign('category_id', 'fk_category1_idx')
                ->references('id')->on('categories_product')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');*/
        });
    }


    public function down(): void
    {
        /*Schema::table('variants', function (Blueprint $table) {
            $table->dropForeign('fk_category1_idx');
        });*/
        Schema::dropIfExists('attr_item_variants');
    }
};
