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
        Schema::create('royal_pass_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('royal_pass_id')->constrained('royal_passes')->onDelete('cascade');
            $table->integer('level');
            $table->integer('points_required');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_premium')->default(false);
            $table->timestamps();
            
            $table->unique(['royal_pass_id', 'level']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('royal_pass_levels');
    }
};
