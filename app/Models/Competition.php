<?php

namespace App\Models;

use App\Models\FootballMatch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use LucaCermenati\CommonTraits\Traits\HasImages;
use LucaCermenati\CommonTraits\Traits\Searchable;

class Competition extends Model
{
    use HasFactory, HasUuids, HasImages, Searchable;

    protected $fillable = [
        'name',
        'description',
        'logo',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'competitions_teams')
            ->withTimestamps();
    }

    public function matches(): HasMany
    {
        return $this->hasMany(FootballMatch::class);
    }

    public function searchables(): array
    {
        return [
            'name'
        ];
    }
}
