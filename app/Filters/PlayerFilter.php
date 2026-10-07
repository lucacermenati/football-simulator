<?php

namespace App\Filters;

use LucaCermenati\CommonTraits\Filters\QueryFilter;

class PlayerFilter extends QueryFilter
{
    public function free($value)
    {
        $this->builder->when((bool) $value, function ($query) {
            $query->whereNull('team_id');
        });
    }
}