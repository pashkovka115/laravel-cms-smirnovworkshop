<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attr_properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('attr_product_property', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(\App\Models\Product\Product::class)
                ->constrained('products')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(\App\Models\Product\Attributes\Property::class)
                ->constrained('attr_properties')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('value');

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::table('attr_product_property', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Product\Product::class);
            $table->dropForeignIdFor(\App\Models\Product\Attributes\Property::class);
        });

        Schema::dropIfExists('attr_product_property');
        Schema::dropIfExists('attr_properties');
    }
};
