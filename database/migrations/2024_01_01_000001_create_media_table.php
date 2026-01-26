<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->nullableMorphs('mediable');
            $table->string('collection')->nullable();
            $table->string('file_name')->nullable();
            $table->text('description')->nullable();
            $table->text('source')->nullable();
            $table->text('keywords')->nullable();
            $table->string('mime_type', 100)->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->enum('type', ['image', 'audio', 'video', 'document'])->index();
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('duration')->nullable();
            $table->json('meta')->nullable();
            $table->boolean('converted')->default(false);
            $table->unsignedTinyInteger('converted_progress')->default(0);
            $table->text('embed')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
