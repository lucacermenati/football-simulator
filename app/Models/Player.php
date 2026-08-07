<?php

namespace App\Models;

use App\Enums\Position;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Player extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'nationality',
        'position',
        'number',
        'team_id',
        'position_on_field',
        'rating',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'number' => 'integer',
        'position' => Position::class,
        'position_on_field' => 'integer',
        'rating' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function matches(): BelongsToMany
    {
        return $this->belongsToMany(FootballMatch::class, 'matches_players', 'player_id', 'match_id')
            ->using(MatchPlayer::class)
            ->withPivot('minute')
            ->withTimestamps();
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}