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
        'es_EC' => [
            'base' => 'es_EC',
            'providers' => [
                \App\Faker\es_EC\Player::class,
            ],
        ],
        'es_MX' => [
            'base' => 'es_ES',
            'providers' => [
                \App\Faker\es_MX\Player::class,
            ],
        ],
        'es_UY' => [
            'base' => 'es_ES',
            'providers' => [
                \App\Faker\es_UY\Player::class,
            ],
        ],
        'en_GH' => [
            'base' => 'en_GH',
            'providers' => [
                \App\Faker\en_GH\Player::class,
            ],
        ],
        'fr_CI' => [
            'base' => 'fr_FR',
            'providers' => [
                \App\Faker\fr_CI\Player::class,
            ],
        ],
        'fr_CM' => [
            'base' => 'fr_FR',
            'providers' => [
                \App\Faker\fr_CM\Player::class,
            ],
        ],
        'fr_SN' => [
            'base' => 'fr_FR',
            'providers' => [
                \App\Faker\fr_SN\Player::class,
            ],
        ],
        'fr_MA' => [
            'base' => 'fr_MA',
            'providers' => [
                \App\Faker\fr_MA\Player::class,
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