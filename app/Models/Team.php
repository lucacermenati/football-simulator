<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Collection;
use App\Models\Concerns\HasLogo;
use LucaCermenati\CommonTraits\Traits\Searchable;

class Team extends Model
{
    use HasFactory, HasUuids, HasLogo, Searchable;

    protected $fillable = [
        'name',
        'logo',
        'first_color',
        'second_color',
        'year_of_foundation',
        'stadium',
        'rating',
        'history',
    ];

    protected $casts = [
        'year_of_foundation' => 'integer',
        'rating' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function competitions(): BelongsToMany
    {
        return $this->belongsToMany(Competition::class, 'competitions_teams')
            ->withTimestamps();
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function startingPlayers(): HasMany
    {
        return $this->hasMany(Player::class)->orderBy('position_on_field')->limit(11);
    }

    public function substitutePlayers(): HasMany
    {
        return $this->hasMany(Player::class)->orderBy('position_on_field')->skip(11)->limit(PHP_INT_MAX);
    }

    public function homeMatches(): HasMany
    {
        return $this->hasMany(FootballMatch::class, 'home_team_id');
    }

    public function awayMatches(): HasMany
    {
        return $this->hasMany(FootballMatch::class, 'away_team_id');
    }

    public function matches(): Collection
    {
        return $this->homeMatches->merge($this->awayMatches);
    }

    public function searchables(): array
    {
        return [
            'name',
        ];
    }
}
