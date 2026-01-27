<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipe_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained()->cascadeOnDelete();
            $table->foreignId('media_id')->constrained()->cascadeOnDelete();
            $table->string('description')->nullable();
            $table->unsignedInteger('position')->default(0);
            $table->timestamps();

            $table->unique(['recipe_id', 'media_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipe_media');
    }
};
