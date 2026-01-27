<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipe_nutrition', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained()->cascadeOnDelete();
            $table->integer('calories')->nullable();
            $table->decimal('fat', 8, 2)->nullable();
            $table->decimal('saturated_fat', 8, 2)->nullable();
            $table->decimal('carbohydrates', 8, 2)->nullable();
            $table->decimal('fiber', 8, 2)->nullable();
            $table->decimal('sugar', 8, 2)->nullable();
            $table->decimal('protein', 8, 2)->nullable();
            $table->decimal('salt', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipe_nutrition');
    }
};
