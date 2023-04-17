<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });


        Schema::create('product_property', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Product\Product::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(\App\Models\Attributes\Property::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('value');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::table('product_property', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Product\Product::class);
            $table->dropForeignIdFor(\App\Models\Attributes\Property::class);
        });

        Schema::dropIfExists('product_property');
        Schema::dropIfExists('properties');
    }
};
