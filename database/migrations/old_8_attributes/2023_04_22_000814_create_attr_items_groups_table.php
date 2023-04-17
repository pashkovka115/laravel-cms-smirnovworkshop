<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attr_items_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('group_id');
            $table->string('item_model');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('attr_items_groups');
    }
};
