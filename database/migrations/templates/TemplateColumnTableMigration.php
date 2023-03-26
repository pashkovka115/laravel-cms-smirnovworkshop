<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class
{
    /**
     * @param Blueprint $table
     * @return Closure
     * Поля Column таблиц
     */
    public static function template(Blueprint $table): Closure
    {
        $func = function () use ($table) {
            $table->id();
            $table->string('origin_name');
            $table->string('type');
            $table->string('show_name');
            $table->integer('sort_list');
            $table->integer('sort_single')->default(100);
            $table->boolean('is_show_anons');
            $table->boolean('is_show_single');
        };
        return $func;
    }
};
