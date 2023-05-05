<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $table = 'products_description';


    public function up(): void
    {
        Schema::create($this->table, function (Blueprint $table) {
//            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('language_id');

//            $class = include base_path('database/migrations/templates/TemplateItemDescriptionMigration.php');
//            $class::template($table)();

            $table->string('title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->string('name');
            $table->string('slug');
            $table->text('announce')->nullable();
            $table->longText('description')->nullable();



            $table->index(['product_id', 'language_id']);

            /*$table->index(["category_id"], 'fk_category1_idx');

            $table->foreign('category_id', 'fk_category1_idx')
                ->references('id')->on('categories_product')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->foreign('parent_id')
                ->references('id')
                ->on('products')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');*/
        });
    }


    public function down(): void
    {
        /*Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('fk_category1_idx');
        });*/
        Schema::dropIfExists($this->table);
    }
};
