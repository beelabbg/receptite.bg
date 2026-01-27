<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('avatar_id')->nullable();
            $table->text('about_me')->nullable();
            $table->json('social_links')->nullable();
            $table->boolean('newsletter_subscribed')->default(false);
            $table->json('newsletter_categories')->nullable();
            $table->json('newsletter_content')->nullable();
            $table->rememberToken();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
