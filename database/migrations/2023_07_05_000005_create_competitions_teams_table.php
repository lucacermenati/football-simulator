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
        Schema::create('competitions_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('competition_id')->constrained('competitions')->onDelete('cascade');
            $table->foreignUuid('team_id')->constrained('teams')->onDelete('cascade');
            $table->timestamps();
            
            // Make sure a team can't be added to the same competition multiple times
            $table->unique(['competition_id', 'team_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitions_teams');
    }
};
