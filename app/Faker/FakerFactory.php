<?php

namespace App\Faker;

use Faker\Factory;
use Faker\Generator;

class FakerFactory
{
    protected static array $customLocales = [
        'es_CO' => [
            'base' => 'es_CO',
            'providers' => [
                \App\Faker\es_CO\Player::class,
            ],
        ],
        'es_MX' => [
            'base' => 'es_ES',
            'providers' => [
                \App\Faker\es_MX\Player::class,
            ],
        ],
        'it_IT' => [
            'base' => 'it_IT',
            'providers' => [
                \App\Faker\it_IT\Player::class,
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
