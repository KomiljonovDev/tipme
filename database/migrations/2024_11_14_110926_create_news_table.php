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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('news_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained('news')->cascadeOnDelete();
            $table->string('locale');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->unique(['news_id', 'locale'], 'news_trans_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_trans');
        Schema::dropIfExists('news');
    }
};
