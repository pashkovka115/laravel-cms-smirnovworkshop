<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts_properties', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_id');

            $class = include "templates/TemplateProperties.php";
            $class::template($table)();

            $table->index(["contact_id"], 'fk_contact_properties2_idx');

            $table->foreign('contact_id', 'fk_contact_properties2_idx')
                ->references('id')->on('contacts')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->unique(['contact_id', 'key']);
        });
    }


    public function down(): void
    {
        Schema::table('contacts_properties', function (Blueprint $table) {
            $table->dropForeign('fk_contact_properties2_idx');
        });
        Schema::dropIfExists('contacts_properties');
    }
};
