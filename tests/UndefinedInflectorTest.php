<?php
declare(strict_types=1);

namespace Noldors\Inflect\Tests;

use Noldors\Inflect\Inflector;
use Noldors\Inflect\Inflectors\UndefinedInflector;

class UndefinedInflectorTest extends BaseTestInflector
{
    /**
     * @var Inflector
     */
    protected static $inflector;

    public static function setUpBeforeClass()
    {
        \Locale::setDefault('ru_RU');
        static::$inflector = new Inflector(new UndefinedInflector());
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
            ['Alias', 'Alias'],
            ['alumnus', 'alumnus'],
            ['analysis', 'analysis'],
            ['aquarium', 'aquarium'],
            ['arches', 'arches'],
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
                'El Papa admite su \'vergüenza por la sangre inocente que se vierte cada día\'',
                'el-papa-admite-su-verguenza-por-la-sangre-inocente-que-se-vierte-cada-dia',
            ],
            [
                'Miles de fieles aclaman a Jesús de Medinaceli en la procesión de Madrid',
                'miles-de-fieles-aclaman-a-jesus-de-medinaceli-en-la-procesion-de-madrid'
            ],
            [
                'Le pape exprime "la honte" du sang innocent versé quotidiennement',
                'le-pape-exprime-la-honte-du-sang-innocent-verse-quotidiennement',
            ],
            [
                'NBA: Jackson ouvre grand la porte à un départ d\'Anthony des Knicks',
                'nba-jackson-ouvre-grand-la-porte-a-un-depart-danthony-des-knicks'
            ],
        ];
    }
}
