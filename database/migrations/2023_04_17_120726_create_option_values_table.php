<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('option_values', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();


            $table->foreignIdFor(\App\Models\Attributes\Option::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });


        Schema::create('option_value_product', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Product\Product::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(\App\Models\Attributes\OptionValue::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }


    public function down(): void
    {
        Schema::table('option_values', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Attributes\Option::class);
        });

        Schema::table('option_value_product', function (Blueprint $table) {
            $table->dropForeignIdFor(\App\Models\Product\Product::class);
            $table->dropForeignIdFor(\App\Models\Attributes\OptionValue::class);
        });

        Schema::dropIfExists('option_value_product');
        Schema::dropIfExists('option_values');
    }
};
