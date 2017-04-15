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
                'Witsel contra Hulk este sábado em A BOLA TV  ',
                'witsel-contra-hulk-este-sabado-em-a-bola-tv',
            ],
            [
                'Frustração e raiva de Luís Enrique em Turim ',
                'frustracao-e-raiva-de-luis-enrique-em-turim',
            ],
            [
                '«O problema não são os guarda-redes» – Guardiola',
                'o-problema-nao-sao-os-guarda-redes-guardiola',
            ],
            [
                '«Vamos a Madrid para dar a volta» – Vidal',
                'vamos-a-madrid-para-dar-a-volta-vidal'
            ],
        ];
    }
}