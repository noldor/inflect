<?php
declare(strict_types=1);

namespace Noldors\Inflect\Tests\RussianDataProviders;

class LetterIY
{
    public static function data():array
    {
        return [

            ['йог', 'йогов', 0],
            ['йог', 'йог', 1],
            ['йог', 'йога', 2],
            ['йог', 'йогов', 30],

            ['йогурт', 'йогуртов', 0],
            ['йогурт', 'йогурт', 1],
            ['йогурт', 'йогурта', 2],
            ['йогурт', 'йогуртов', 30],
        ];
    }
}
