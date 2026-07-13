<?php

namespace App\Faker;

use Faker\Factory;
use Faker\Generator;

class FakerFactory
{
    protected static array $customLocales = [
        'en_NIR' => [
            'base' => 'en_GB',
            'providers' => [
                \App\Faker\en_NIR\Player::class,
            ],
        ],
        'en_SCT' => [
            'base' => 'en_GB',
            'providers' => [
                \App\Faker\en_SCT\Player::class,
            ],
        ],
        'en_IE' => [
            'base' => 'en_GB',
            'providers' => [
                \App\Faker\en_IE\Player::class,
            ],
        ],
        'en_WLS' => [
            'base' => 'en_GB',
            'providers' => [
                \App\Faker\en_WLS\Player::class,
            ],
        ],
        'es_CO' => [
            'base' => 'es_ES',
            'providers' => [
                \App\Faker\es_CO\Player::class,
            ],
        ],
        'es_CL' => [
            'base' => 'es_ES',
            'providers' => [
                \App\Faker\es_CL\Player::class,
            ],
        ],
        'es_EC' => [
            'base' => 'es_ES',
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
        'en_ZM' => [
            'base' => 'en_ZM',
            'providers' => [
                \App\Faker\en_ZM\Player::class,
            ],
        ],
        'en_SL' => [
            'base' => 'en_SL',
            'providers' => [
                \App\Faker\en_SL\Player::class,
            ],
        ],
        'en_ZA' => [
            'base' => 'en_ZA',
            'providers' => [
                \App\Faker\en_ZA\Player::class,
            ],
        ],
        'fr_CD' => [
            'base' => 'fr_FR',
            'providers' => [
                \App\Faker\fr_CD\Player::class,
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
        'fr_DZ' => [
            'base' => 'fr_DZ',
            'providers' => [
                \App\Faker\fr_DZ\Player::class,
            ],
        ],
        'fr_TN' => [
            'base' => 'fr_TN',
            'providers' => [
                \App\Faker\fr_TN\Player::class,
            ],
        ],
        'it_IT' => [
            'base' => 'it_IT',
            'providers' => [
                \App\Faker\it_IT\Player::class,
            ],
        ],
        'sq_AL' => [
            'base' => 'sq_AL',
            'providers' => [
                \App\Faker\sq_AL\Player::class,
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
