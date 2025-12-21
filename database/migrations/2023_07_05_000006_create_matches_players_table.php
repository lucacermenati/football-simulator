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
        Schema::create('matches_players', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('match_id')->constrained('matches')->onDelete('cascade');
            $table->foreignUuid('player_id')->constrained('players')->onDelete('cascade');
            $table->integer('minute')->unsigned();
            $table->timestamps();
            
            // Allow multiple goals by the same player in the same match
            // But each must have a unique minute (one goal per minute per player)
            $table->unique(['match_id', 'player_id', 'minute']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches_players');
    }
};
