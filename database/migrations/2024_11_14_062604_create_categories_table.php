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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('category_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('locale');
            $table->string('name');
            $table->timestamps();

            $table->unique(['category_id', 'locale'], 'cat_trans_unique');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('category_trans');
        Schema::dropIfExists('categories');
    }
};
