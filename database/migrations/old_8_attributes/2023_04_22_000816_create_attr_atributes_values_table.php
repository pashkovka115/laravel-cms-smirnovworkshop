<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attr_atributes_values', function (Blueprint $table) {
            $table->unsignedBigInteger('value_id');
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('item_id');


            $table->foreign('value_id')
                ->references('id')->on('attr_values')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('attribute_id')
                ->references('id')->on('attr_atributes')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }


    public function down(): void
    {
        Schema::table('attr_atributes_values', function (Blueprint $table) {
            $table->dropForeign(['value_id']);
            $table->dropForeign(['attribute_id']);
        });
        Schema::dropIfExists('attr_atributes_values');
    }
};
