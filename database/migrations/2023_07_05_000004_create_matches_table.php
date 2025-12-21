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
        Schema::create('matches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('competition_id')->constrained('competitions');
            $table->foreignUuid('home_team_id')->constrained('teams');
            $table->foreignUuid('away_team_id')->constrained('teams');
            $table->integer('goal_home')->default(0);
            $table->integer('goal_away')->default(0);
            $table->dateTime('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
