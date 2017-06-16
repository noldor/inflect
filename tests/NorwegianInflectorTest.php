<?php
declare(strict_types=1);

namespace Noldors\Inflect\Tests;

use Noldors\Inflect\Inflector;
use Noldors\Inflect\Inflectors\NorwegianInflector;

class NorwegianInflectorTest extends BaseTestInflector
{
    /**
     * @var Inflector
     */
    protected static $inflector;

    public static function setUpBeforeClass()
    {
        \Locale::setDefault('ru_RU');
        static::$inflector = new Inflector(new NorwegianInflector());
    }

    /**
     * Singular & Plural test data. Returns an array of sample words.
     *
     * @return array
     */
    public function dataSampleWords()
    {
        return [
            ['', ''],
            // irregular
            ['konto', 'konti'],

        ];
    }

    /**
     * Normal & Transliterated data.
     *
     * @return array
     */
    public function dataSampleTranslit()
    {
        return [
            [
                'Trodde du Trump satt i møter med sine militære rådgivere ',
                'trodde-du-trump-satt-i-moter-med-sine-militaere-radgivere',
            ],
            [
                'Nei da, han spiller golf med USAs rikeste ',
                'nei-da-han-spiller-golf-med-usas-rikeste',
            ],
            [
                'Tabubelagt å være ensom i Norge.',
                'tabubelagt-a-vaere-ensom-i-norge',
            ],
            [
                'Ukjent hvor mange som er ulovlig i Norge',
                'ukjent-hvor-mange-som-er-ulovlig-i-norge'
            ],
        ];
    }
}
