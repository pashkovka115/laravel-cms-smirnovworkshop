<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attr_item_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attr_item_variant_id');
            $table->unsignedBigInteger('attr_variant_value_id');



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
        Schema::dropIfExists('attr_item_details');
    }
};
