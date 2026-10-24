<?php

namespace App\Sorters;

use LucaCermenati\CommonTraits\Sorters\QuerySorter;

class TeamSorter extends QuerySorter
{
    public function name(string $direction): void
    {
        $this->builder->orderBy('name', $direction);
    }

    public function rating(string $direction): void
    {
        $this->builder->orderBy('rating', $direction);
    }

    public function yearOfFoundation(string $direction): void
    {
        $this->builder->orderBy('year_of_foundation', $direction);
    }

    public function stadium(string $direction): void
    {
        $this->builder->orderBy('stadium', $direction);
    }
}
