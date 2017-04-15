<?php
declare(strict_types=1);

namespace Noldors\Inflect\Tests;

use Noldors\Inflect\Inflector;
use Noldors\Inflect\Inflectors\PortugueseInflector;

class PortugueseInflectorTest extends BaseTestInflector
{
    /**
     * @var Inflector
     */
    protected static $inflector;

    public static function setUpBeforeClass()
    {
        \Locale::setDefault('ru_RU');
        static::$inflector = new Inflector(new PortugueseInflector());
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
            ['chão', 'chãos'],
            ['charlatão', 'charlatães'],
            ['cidadão', 'cidadãos'],
            ['consul', 'consules'],
            ['cristão', 'cristãos'],
            ['difícil', 'difíceis'],
            ['email', 'emails'],

            ['patrão', 'patrões'],
            ['ladrão', 'ladrões'],
            ['casarão', 'casarões'],
            # Palavras terminadas em (r|s|z) adiciona es
            # Palavras terminadas em (a|e|o|u) + l adiciona is
            # Palavras terminadas em il adiciona is
            ['cantil', 'cantis'],
            ['canil', 'canis'],
            # Palavras terminadas em (m|n) adiciona ns
            ['afim', 'afins'],
            ['agiotagem', 'agiotagens'],
            # Pdrão simplismente adiciona s
            ['carro', 'carros'],
            ['familia', 'familias']


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