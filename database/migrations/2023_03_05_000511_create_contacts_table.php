<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $class = include 'templates/TemplateMetaFieldsMigration.php';
            $class::template($table)();

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
