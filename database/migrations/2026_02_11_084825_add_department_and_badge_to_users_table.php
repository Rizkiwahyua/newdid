<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            // Tambah kolom string
            $table->string('department_name')->nullable();

            // Kalau ada foreign key department_id, drop dulu
            if (Schema::hasColumn('users', 'department_id')) {

                $table->dropForeign(['department_id']); // kalau ada FK
                $table->dropColumn('department_id');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('department_name');
        });
    }
};
