<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->json('sections')->nullable();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('ingredients')->nullable();
            $table->text('instructions')->nullable();
            $table->integer('prep_time_minutes')->nullable();
            $table->integer('cook_time_minutes')->nullable();
            $table->integer('total_time_minutes')->nullable();
            $table->integer('servings')->nullable();
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('medium');
            $table->foreignId('image_id')->nullable()->constrained('media')->nullOnDelete();
            $table->boolean('no_comments')->default(false);
            $table->integer('comments_counter')->default(0);
            $table->integer('report')->default(0);
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->integer('votes')->default(0);
            $table->timestamp('published_on')->nullable();
            $table->boolean('active')->default(true);
            $table->json('tags')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['user_id', 'active']);
            $table->index('published_on');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
