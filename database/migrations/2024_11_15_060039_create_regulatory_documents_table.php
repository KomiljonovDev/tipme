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
        Schema::create('regulatory_documents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('reg_doc_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regulatory_document_id')
                ->constrained('regulatory_documents')
                ->cascadeOnDelete();
            $table->string('locale');
            $table->string('name');
            $table->timestamps();

            $table->unique(['regulatory_document_id', 'locale'], 'reg_doc_trans_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('regulatory_document_trans');
        Schema::dropIfExists('regulatory_documents');
    }
};
