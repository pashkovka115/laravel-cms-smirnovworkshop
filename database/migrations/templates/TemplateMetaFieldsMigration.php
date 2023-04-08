<?php

use Illuminate\Database\Schema\Blueprint;

return new class {
    /**
     * Общий шаблон для описания большинства типов контента(страниц).
     */
    public static function template(Blueprint $table): Closure
    {
        $fields = function () use ($table) {
            $table->string('title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('name_lavel', 2)->default('h2');

            $table->string('name');
            $table->string('slug');
            $table->integer('sort')->default(0);
            $table->string('img_announce')->nullable();
            $table->string('img_detail')->nullable();
            $table->text('announce')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_show')->default(true);

            // Сама галерея хранится в другой таблице. Например "product_images"
            $table->string('img_gallery')->nullable()->comment('Для привязки другой таблицы. Нужно для сортировки в админке');
            $table->string('additional_fields')->nullable()->comment('Для привязки другой таблицы. Нужно для сортировки в админке');
        };

        return $fields;
    }
};
