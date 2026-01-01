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
        Schema::create('teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('first_color', 7)->nullable(); // Hex color code
            $table->string('second_color', 7)->nullable(); // Hex color code
            $table->unsignedSmallInteger('year_of_foundation')->nullable();
            $table->string('stadium')->nullable();
            $table->unsignedTinyInteger('rating')->default(70);
            $table->text('history')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
