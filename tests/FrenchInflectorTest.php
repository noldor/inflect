<?php
declare(strict_types=1);

namespace Noldors\Inflect\Tests;

use Noldors\Inflect\Inflector;
use Noldors\Inflect\Inflectors\FrenchInflector;

class FrenchInflectorTest extends BaseTestInflector
{
    /**
     * @var Inflector
     */
    protected static $inflector;

    public static function setUpBeforeClass()
    {
        \Locale::setDefault('ru_RU');
        static::$inflector = new Inflector(new FrenchInflector());
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
            ['monsieur', 'messieurs'],
            ['madame', 'mesdames'],
            ['mademoiselle', 'mesdemoiselles'],

            ['ami', 'amis'],
            ['chien', 'chiens'],
            ['fidèle', 'fidèles'],
            ['rapport', 'rapports'],
            [ 'sain', 'sains'],
            ['jouet', 'jouets'],
            ['bijou', 'bijoux'],
            ['caillou', 'cailloux'],
            ['chou', 'choux'],
            ['genou', 'genoux'],
            ['hibou', 'hiboux'],
            ['joujou', 'joujoux'],
            ['pou', 'poux'],
            # -s, -x, -z
            ['gaz', 'gaz'],
            # -au, -eu, -eau
            ['tuyau', 'tuyaux'],
            ['nouveau', 'nouveaux'],
            ['aveu', 'aveux'],
            ['bleu', 'bleus'],
            ['émeu', 'émeus'],
            ['landau', 'landaus'],
            ['lieu', 'lieus'], // poisson
            ['pneu', 'pneus'],
            ['sarrau', 'sarraus'],
            # -al
            ['journal', 'journaux'],
            # -ail
            ['détail', 'détails'],
            # -ail (exceptions)
            ['bail', 'baux'],
            ['corail', 'coraux'],
            ['émail', 'émaux'],
            ['gemmail', 'gemmaux'],
            ['soupirail', 'soupiraux'],
            ['travail', 'travaux'],
            ['vantail', 'vantaux'],
            ['vitrail', 'vitraux']
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
                'Des unités militaires massées à Pyongyang pour une démonstration de force ',
                'des-unites-militaires-massees-a-pyongyang-pour-une-demonstration-de-force',
            ],
            [
                'Uber a perdu 2,8 milliards de dollars en 2016, malgré une activité en hausse',
                'uber-a-perdu-28-milliards-de-dollars-en-2016-malgre-une-activite-en-hausse',
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
