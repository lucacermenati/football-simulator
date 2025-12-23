<?php

namespace App\Enums;

enum Role: string
{
    case Goalkeeper = 'Goalkeeper';
    case Defender = 'Defender';
    case Midfielder = 'Midfielder';
    case Forward = 'Forward';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function validationRule(): string
    {
        return 'in:' . implode(',', self::values());
    }
}
