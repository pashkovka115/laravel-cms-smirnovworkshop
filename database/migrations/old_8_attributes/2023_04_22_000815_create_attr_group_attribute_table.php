<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attr_group_attribute', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('item_id');

            $table->foreign('group_id')
                ->references('id')->on('attr_groups')
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
        Schema::table('attr_group_attribute', function (Blueprint $table) {
            $table->dropForeign(['group_id']);
            $table->dropForeign(['attribute_id']);
        });
        Schema::dropIfExists('attr_group_attribute');
    }
};
