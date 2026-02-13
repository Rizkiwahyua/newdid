<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documents', function (Blueprint $table) {

            // Drop foreign key dulu
            $table->dropForeign(['work_unit_id']);

            // Baru drop kolomnya
            $table->dropColumn('work_unit_id');

        });
    }

    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {

            $table->foreignId('work_unit_id')
                  ->constrained()
                  ->cascadeOnDelete();

        });
    }
};
