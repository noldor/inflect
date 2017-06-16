<?php
declare(strict_types=1);

namespace Noldors\Inflect\Tests;

use PHPUnit\Framework\TestCase;

abstract class BaseTestInflector extends TestCase
{
    /**
     * @var \Noldors\Inflect\Inflector
     */
    protected static $inflector;

    /**
     * testEnglishInflector method
     *
     * @dataProvider dataSampleWords
     * @return void
     */
    public function testCanPluralizeWord($singular, $plural)
    {
        $this->assertEquals($plural, static::$inflector->plural($singular));
    }

    /**
     * testInflectingSingulars method
     *
     * @dataProvider dataSampleWords
     * @return void
     */
    public function testCanSingularizeWord($singular, $plural)
    {
        $this->assertEquals($singular, static::$inflector->singular($plural));
    }

    /**
     * testInflectingTranslit method
     *
     * @dataProvider dataSampleTranslit
     * @return void
     */
    public function testCanTransliterateSentence($normal, $translit)
    {
        $this->assertEquals($translit, static::$inflector->slug($normal));
    }
}
