<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts_columns', function (Blueprint $table) {
            $class = include 'templates/TemplateColumnTableMigration.php';
            $class::template($table)();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('contacts_columns');
    }
};
