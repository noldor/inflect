<?php
declare(strict_types=1);

namespace Noldors\Inflect\Tests;

use Noldors\Inflect\Inflector;
use Noldors\Inflect\Inflectors\TurkishInflector;

class TurkishInflectorTest extends BaseTestInflector
{
    /**
     * @var Inflector
     */
    protected static $inflector;

    public static function setUpBeforeClass()
    {
        \Locale::setDefault('ru_RU');
        static::$inflector = new Inflector(new TurkishInflector());
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
            ['ben', 'biz'],
            ['sen', 'siz'],
            ['o', 'onlar'],

            // If a noun ends in a vowel, make it plural by adding -s
            ['gün', 'günler'],
            ['kiraz', 'kirazlar'],
            ['kitap', 'kitaplar'],
            ['köpek', 'köpekler'],
            ['test', 'testler'],
            ['üçgen', 'üçgenler']
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
                'Burçlarına göre erkekleri etkileme rehberi ',
                'burclarina-gore-erkekleri-etkileme-rehberi',
            ],
            [
                'Twitter\'ı kasıp kavuran komik tweet\'ler ',
                'twitteri-kasip-kavuran-komik-tweetler',
            ],
            [
                'ABD\'den Rusya\'yı kızdıracak hamle',
                'abdden-rusyayi-kizdiracak-hamle',
            ],
            [
                'Batı\'ya sert mesaj: Dünya düzeni tehlikeye girer',
                'batiya-sert-mesaj-dunya-duzeni-tehlikeye-girer'
            ],
        ];
    }
}
