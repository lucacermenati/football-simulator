<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Collection;

class Team extends Model
{
    use HasFactory, HasUuids;

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

    public function competitions(): BelongsToMany
    {
        return $this->belongsToMany(Competition::class, 'competitions_teams')
            ->withTimestamps();
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
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
}
