<?php

namespace App\Models;

use App\Models\FootballMatch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Competition extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'description',
    ];

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'competitions_teams')
            ->withTimestamps();
    }

    public function matches(): HasMany
    {
        return $this->hasMany(FootballMatch::class);
    }
}
