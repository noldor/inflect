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
                'Donald Trump desafía a seis países en solo diez días ',
                'donald-trump-desafia-a-seis-paises-en-solo-diez-dias',
            ],
            [
                'La emotiva carta abierta de Marc Bartra desde el hospital ',
                'la-emotiva-carta-abierta-de-marc-bartra-desde-el-hospital',
            ],
            [
                'El Papa admite su \'vergüenza por la sangre inocente que se vierte cada día\'',
                'el-papa-admite-su-verguenza-por-la-sangre-inocente-que-se-vierte-cada-dia',
            ],
            [
                'Miles de fieles aclaman a Jesús de Medinaceli en la procesión de Madrid',
                'miles-de-fieles-aclaman-a-jesus-de-medinaceli-en-la-procesion-de-madrid'
            ],
        ];
    }
}