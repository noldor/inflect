<?php
declare(strict_types=1);

namespace Noldors\Inflect\Tests;

use Noldors\Inflect\Inflector;
use Noldors\Inflect\Inflectors\SpanishInflector;

class SpanishInflectorTest extends BaseTestInflector
{
    /**
     * @var Inflector
     */
    protected static $inflector;

    public static function setUpBeforeClass()
    {
        \Locale::setDefault('ru_RU');
        static::$inflector = new Inflector(new SpanishInflector());
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
            ['el', 'los'],
            ['lunes', 'lunes'],
            ['rompecabezas', 'rompecabezas'],
            ['crisis', 'crisis'],
            ['papá', 'papás'],
            ['mamá', 'mamás'],
            ['sofá', 'sofás'],

            // If a noun ends in a vowel, make it plural by adding -s
            ['libro', 'libros'],
            ['pluma', 'plumas'],
            ['chico', 'chicos'],
            ['señora', 'señoras'],
            ['radio', 'radios'],
            // If a noun ends in a consonant, make it plural by adding -es
            ['borrador', 'borradores'],
            ['universidad', 'universidades'],
            ['profesor', 'profesores'],
            ['ciudad', 'ciudades'],
            ['señor', 'señores'],
            ['escultor', 'escultores'],
            ['sociedad', 'sociedades'],
            ['azul', 'azules'],
            ['mes', 'meses'],
            // If a noun ends in -ión, add -es and drop the written accent
            ['avión', 'aviones'],
            ['conversación', 'conversaciones'],
            ['sección', 'secciones'],
            ['televisión', 'televisiones'],
            ['interés', 'intereses'],
            // If a noun ends in -z, add -es and change the z to c.
            ['lápiz', 'lápices'],
            ['voz', 'voces'],
            ['tapiz', 'tapices'],
            ['actriz', 'actrices'],
            ['luz', 'luces'],
            ['mez', 'meces'],
            // Words ending in a stressed vowel, add the letters es
            ['tisú', 'tisúes'],
            ['hindú', 'hindúes'],
            //
            ['ley', 'leyes'],
            ['café', 'cafés']
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