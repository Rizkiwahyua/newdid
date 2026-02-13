<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('document_number')->nullable();
            $table->string('revision')->nullable();
            $table->date('document_date')->nullable();
            $table->text('description')->nullable();

            $table->foreignId('document_category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('document_code_id')
                ->constrained()
                ->cascadeOnDelete();
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
