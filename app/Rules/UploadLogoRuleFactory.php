<?php

namespace App\Rules;

use Illuminate\Validation\Rules\File;

final class UploadLogoRuleFactory
{
    public static function optional(): array
    {
        return ['nullable', self::file()];
    }

    public static function required(): array
    {
        return ['required', self::file()];
    }

    private static function file(): File
    {
        return File::image(allowSvg: true)
            ->types(['jpeg', 'png', 'jpg', 'gif', 'svg'])
            ->max(2048);
    }
}
