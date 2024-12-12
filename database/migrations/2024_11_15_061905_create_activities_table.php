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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('activity_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_id')->constrained('activities')->cascadeOnDelete();
            $table->string('locale');
            $table->string('name');
            $table->text('description');
            $table->timestamps();

            $table->unique(['activity_id', 'locale'], 'act_trans_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_trans');
        Schema::dropIfExists('activities');
    }
};
