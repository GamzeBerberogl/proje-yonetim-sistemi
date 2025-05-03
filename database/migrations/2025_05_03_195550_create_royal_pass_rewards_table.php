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
        Schema::create('royal_pass_rewards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('royal_pass_level_id')->constrained('royal_pass_levels')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->enum('type', ['badge', 'achievement', 'bonus', 'title', 'other'])->default('badge');
            $table->boolean('is_premium')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('royal_pass_rewards');
    }
};
