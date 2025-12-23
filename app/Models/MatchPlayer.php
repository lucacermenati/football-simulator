<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatchPlayer extends Pivot
{
    protected $table = 'matches_players';

    protected $fillable = [
        'match_id',
        'player_id',
        'minute',
    ];

    protected $casts = [
        'minute' => 'integer',
    ];

    public function match(): BelongsTo
    {
        return $this->belongsTo(FootballMatch::class, 'match_id');
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
