<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attr_option_values', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();


            $table->foreignIdFor(\App\Models\Product\Attributes\Option::class)
                ->constrained('attr_options')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });


        Schema::create('attr_option_value_product', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Product\Product::class)
                ->constrained('products')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(\App\Models\Product\Attributes\OptionValue::class)
                ->constrained('attr_option_values')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }


    public function down(): void
    {
        Schema::table('attr_option_values', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Product\Attributes\Option::class);
        });

        Schema::table('attr_option_value_product', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Product\Product::class);
            $table->dropForeignIdFor(\App\Models\Product\Attributes\OptionValue::class);
        });

        Schema::dropIfExists('attr_option_value_product');
        Schema::dropIfExists('attr_option_values');
    }
};
