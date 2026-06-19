<?php

namespace App\Faker;

use Faker\Factory;
use Faker\Generator;

class FakerFactory
{
    protected static array $customLocales = [
        'es_MX' => [
            'base' => 'es_ES',
            'providers' => [
                \App\Faker\es_MX\Player::class,
            ],
        ],
    ];

    public static function create(string $locale): Generator
    {
        if (! isset(static::$customLocales[$locale])) {
            return Factory::create($locale);
        }

        $config = static::$customLocales[$locale];

        $faker = Factory::create($config['base']);

        foreach ($config['providers'] as $provider) {
            $faker->addProvider(new $provider($faker));
        }

        return $faker;
    }
}