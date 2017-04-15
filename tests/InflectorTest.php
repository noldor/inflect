<?php
declare(strict_types=1);

namespace Noldors\Inflect\Tests;

use Noldors\Inflect\Inflector;
use Noldors\Inflect\Inflectors\EnglishInflector;
use Noldors\Inflect\Inflectors\RussianInflector;
use PHPUnit\Framework\TestCase;

class InflectorTest extends TestCase
{
    public function testCanSetInflector()
    {
        $inflector = new Inflector(new RussianInflector());

        $reflectionClass = new \ReflectionClass($inflector);
        $property = $reflectionClass->getProperty('inflector');
        $property->setAccessible(true);

        $this->assertInstanceOf(RussianInflector::class, $property->getValue($inflector));
    }

    public function testCanSetDefaultInflector()
    {
        $inflector = new Inflector(new EnglishInflector());

        $reflectionClass = new \ReflectionClass($inflector);
        $property = $reflectionClass->getProperty('inflector');
        $property->setAccessible(true);

        $this->assertInstanceOf(EnglishInflector::class, $property->getValue($inflector));
    }

    public function testMake()
    {
        $this->assertInstanceOf(Inflector::class, Inflector::make(new RussianInflector()));
    }
}