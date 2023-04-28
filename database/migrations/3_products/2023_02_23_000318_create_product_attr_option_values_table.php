<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_attr_option_values', function (Blueprint $table) {
            $table->id();
            $table->string('name');


            $table->foreignIdFor(\App\Models\Product\Attributes\Option::class)
                ->constrained('product_attr_options')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });


        Schema::create('product_attr_option_value_product', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Product\Product::class)
                ->constrained('products')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(\App\Models\Product\Attributes\OptionValue::class)
                ->constrained('product_attr_option_values')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }


    public function down(): void
    {
        Schema::table('product_attr_option_values', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Product\Attributes\Option::class);
        });

        Schema::table('product_attr_option_value_product', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Product\Product::class);
            $table->dropForeignIdFor(\App\Models\Product\Attributes\OptionValue::class);
        });

        Schema::dropIfExists('product_attr_option_value_product');
        Schema::dropIfExists('product_attr_option_values');
    }
};
