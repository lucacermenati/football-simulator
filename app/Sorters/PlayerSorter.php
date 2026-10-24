<?php

namespace App\Sorters;

use LucaCermenati\CommonTraits\Sorters\QuerySorter;

class PlayerSorter extends QuerySorter
{
    public function name(string $direction): void
    {
        $this->builder
            ->orderBy('last_name', $direction)
            ->orderBy('first_name', $direction);
    }

    public function birthDate(string $direction): void
    {
        $this->builder->orderBy('birth_date', $direction);
    }

    public function position(string $direction): void
    {
        $this->builder->orderByPosition($direction);
    }
}
