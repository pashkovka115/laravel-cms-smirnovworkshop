<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable()->default(null);

            $class = include base_path('database/migrations/templates/TemplateMetaFieldsMigration.php');
            $class::template($table)();

            /*$table->boolean('is_show')->default(true);
            $table->string('name_lavel', 2)->default('h2');
            $table->integer('sort')->default(0);
            $table->string('img_announce')->nullable();
            $table->string('img_detail')->nullable();*/

            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('categories_product')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
        });
    }


    public function down(): void
    {
        Schema::table('categories_product', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
        });
        Schema::dropIfExists('categories_product');
    }
};
