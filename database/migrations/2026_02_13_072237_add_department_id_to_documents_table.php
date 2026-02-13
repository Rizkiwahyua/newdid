<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documents', function (Blueprint $table) {

            $table->foreignId('department_id')
                ->after('document_code_id')
                ->constrained()
                ->cascadeOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');
        });
    }
};
