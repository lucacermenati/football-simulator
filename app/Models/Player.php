<?php

namespace App\Models;

use App\Enums\Position;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use LucaCermenati\CommonTraits\Traits\Filterable;
use LucaCermenati\CommonTraits\Traits\Searchable;
use LucaCermenati\CommonTraits\Traits\Sortable;
use Override;

class Player extends Model
{
    use Filterable, HasFactory, HasUuids, Searchable, Sortable;

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
        'user_id',
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

    public function scopeOrderByPosition(Builder $query, string $direction = 'asc'): Builder
    {
        $direction = strtolower($direction) === 'desc' ? 'desc' : 'asc';

        return $query->orderByRaw("
            CASE position
                WHEN 'Goalkeeper' THEN 1
                WHEN 'Defender' THEN 2
                WHEN 'Midfielder' THEN 3
                WHEN 'Forward' THEN 4
                ELSE 5
            END {$direction}
        ")->orderBy('position_on_field', $direction);
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    #[Override]
    public function searchables(): array
    {
        return [
            'first_name',
            'last_name',
            'team.name',
        ];
    }
}
