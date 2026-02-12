<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            // hanya tambah no badge
            if (!Schema::hasColumn('users', 'no_badge')) {
                $table->string('no_badge')->nullable()->unique();
            }

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('no_badge');
        });
    }

};
