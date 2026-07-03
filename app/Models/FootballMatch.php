<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class FootballMatch extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'matches';

    protected $fillable = [
        'competition_id',
        'home_team_id',
        'away_team_id',
        'goal_home',
        'goal_away',
        'date',
        'played'
    ];

    protected $casts = [
        'date' => 'datetime',
        'goal_home' => 'integer',
        'goal_away' => 'integer',
        'played' => 'boolean',
    ];

    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function scorers(): BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'matches_players', 'match_id', 'player_id')
            ->using(MatchPlayer::class)
            ->withPivot('minute')
            ->orderBy('minute')
            ->withTimestamps();
    }
}