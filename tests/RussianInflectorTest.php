<?php
declare(strict_types=1);

namespace Noldors\Inflect\Tests\Inflector;

use Noldors\Inflect\Inflector;
use Noldors\Inflect\Inflectors\RussianInflector;
use Noldors\Inflect\Tests\RussianDataProviders\LetterA;
use Noldors\Inflect\Tests\RussianDataProviders\LetterB;
use Noldors\Inflect\Tests\RussianDataProviders\LetterD;
use Noldors\Inflect\Tests\RussianDataProviders\LetterE;
use Noldors\Inflect\Tests\RussianDataProviders\LetterG;
use Noldors\Inflect\Tests\RussianDataProviders\LetterI;
use Noldors\Inflect\Tests\RussianDataProviders\LetterIY;
use Noldors\Inflect\Tests\RussianDataProviders\LetterK;
use Noldors\Inflect\Tests\RussianDataProviders\LetterL;
use Noldors\Inflect\Tests\RussianDataProviders\LetterM;
use Noldors\Inflect\Tests\RussianDataProviders\LetterN;
use Noldors\Inflect\Tests\RussianDataProviders\LetterO;
use Noldors\Inflect\Tests\RussianDataProviders\LetterP;
use Noldors\Inflect\Tests\RussianDataProviders\LetterR;
use Noldors\Inflect\Tests\RussianDataProviders\LetterS;
use Noldors\Inflect\Tests\RussianDataProviders\LetterT;
use Noldors\Inflect\Tests\RussianDataProviders\LetterU;
use Noldors\Inflect\Tests\RussianDataProviders\LetterV;
use Noldors\Inflect\Tests\RussianDataProviders\LetterZ;
use Noldors\Inflect\Tests\RussianDataProviders\LetterZH;
use Noldors\Inflect\Tests\RussianDataProviders\OtherLetters;
use PHPUnit\Framework\TestCase;

class RussianInflectorTest extends TestCase
{
    /**
     * @var Inflector
     */
    protected static $inflector;

    public static function setUpBeforeClass()
    {
        \Locale::setDefault('ru_RU');
        static::$inflector = new Inflector(new RussianInflector());
    }

    /**
     * Singular & Plural test data. Returns an array of sample words.
     *
     * @return array
     */
    public function dataSampleWords()
    {
        return array_merge(
            LetterA::data(),
            LetterB::data(),
            LetterV::data()
            //LetterG::data(),
            //LetterD::data(),
            //LetterE::data(),
            //LetterZH::data(),
            //LetterZ::data(),
            //LetterI::data(),
            //LetterIY::data(),
            //LetterK::data(),
            //LetterL::data(),
            //LetterM::data(),
            //LetterN::data(),
            //LetterO::data(),
            //LetterP::data(),
            //LetterR::data(),
            //LetterS::data(),
            //LetterT::data(),
            //LetterU::data(),
            //OtherLetters::data()
        );
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
                'Универсальный грамматический анализатор естественных языков с нуля. Выпуск 1.',
                'universalnyy-grammaticheskiy-analizator-yestestvennykh-yazykov-s-nulya-vypusk-1'
            ],
            [
                'Как Discord хранит миллиарды сообщений',
                'kak-discord-khranit-milliardy-soobshcheniy'
            ],
            [
                'Security Week 10: удаленное управление по DNS, как Google капчу свою обманул, дыра в плагине к Wordpress',
                'security-week-10-udalennoye-upravleniye-po-dns-kak-google-kapchu-svoyu-obmanul-dyra-v-plagine-k-wordpress'
            ],
            [
                'NeoQuest 2017: Реверс андроид приложения в задании «Почини вождя!»',
                'neoquest-2017-revers-android-prilozheniya-v-zadanii-pochini-vozhdya'
            ],
        ];
    }

    /**
     * testRussianInflectorPluralize method
     *
     * @dataProvider dataSampleWords
     * @return void
     */
    public function testCanPluralizeWord($singular, $plural, $count)
    {
        $this->assertEquals($plural, static::$inflector->plural($singular, $count));
    }

    /**
     * testRussianInflectorSingularize method
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
