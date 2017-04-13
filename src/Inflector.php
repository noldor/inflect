<?php
declare(strict_types=1);

namespace Noldors\Inflect;

use Noldors\Inflect\Contracts\InflectorInterface;
use Noldors\Inflect\Inflectors\EnglishInflector;
use Noldors\Inflect\Inflectors\RussianInflector;
use Noldors\Inflect\Inflectors\UndefinedInflector;

/**
 * @package Noldors\Helpers\Inflector
 */
class Inflector
{
    /**
     * @var InflectorInterface
     */
    protected $inflector = null;

    private $locales = [
        'en' => [
            'en_AS',
            'en_AU',
            'en_BE',
            'en_BZ',
            'en_BW',
            'en_CA',
            'en_GU',
            'en_HK',
            'en_IN',
            'en_IE',
            'en_JM',
            'en_MT',
            'en_MH',
            'en_MU',
            'en_NA',
            'en_NZ',
            'en_MP',
            'en_PK',
            'en_PH',
            'en_SG',
            'en_ZA',
            'en_TT',
            'en_UM',
            'en_VI',
            'en_GB',
            'en_US',
            'en_ZW',
            'en',
            'en_AS.utf8',
            'en_AU.utf8',
            'en_BE.utf8',
            'en_BZ.utf8',
            'en_BW.utf8',
            'en_CA.utf8',
            'en_GU.utf8',
            'en_HK.utf8',
            'en_IN.utf8',
            'en_IE.utf8',
            'en_JM.utf8',
            'en_MT.utf8',
            'en_MH.utf8',
            'en_MU.utf8',
            'en_NA.utf8',
            'en_NZ.utf8',
            'en_MP.utf8',
            'en_PK.utf8',
            'en_PH.utf8',
            'en_SG.utf8',
            'en_ZA.utf8',
            'en_TT.utf8',
            'en_UM.utf8',
            'en_VI.utf8',
            'en_GB.utf8',
            'en_US.utf8',
            'en_ZW.utf8',
            'en.utf8',
        ],
        'ru' => [
            'ru_RU',
            'ru',
            'ru_RU.utf8',
            'ru.utf8'
        ]
    ];

    /**
     * Set default locale for scripts.
     *
     * @param \Noldors\Inflect\Contracts\InflectorInterface|null $inflector
     */
    public function __construct(InflectorInterface $inflector = null)
    {
        if (is_null($inflector)) {
            $this->inflector = $this->getInflectorByLocale();
        } else {
            $this->inflector = $inflector;
        }
    }

    /**
     * Factory for inflector.
     *
     * @return \Noldors\Inflect\Contracts\InflectorInterface
     */
    private function getInflectorByLocale(): InflectorInterface
    {
        $locale = \Locale::getDefault();

        if (in_array($locale, $this->locales['ru'], true)) {
            return new RussianInflector();
        } else if (in_array($locale, $this->locales['en'], true)) {
            return new EnglishInflector();
        } else {
            return new UndefinedInflector();
        }
    }

    /**
     * Static constructor.
     *
     * @param \Noldors\Inflect\Contracts\InflectorInterface|null $inflector
     *
     * @return \Noldors\Inflect\Inflector
     */
    public static function make(InflectorInterface $inflector = null)
    {
        return new self($inflector);
    }

    /**
     * Get the plural form of word.
     *
     * @param  string $value
     * @param  int    $count
     *
     * @return string
     */
    public function plural(string $value, int $count = 2): string
    {
        return $this->inflector->plural($value, $count);
    }

    /**
     * Get the singular form of an English word.
     *
     * @param  string $value
     *
     * @return string
     */
    public function singular(string $value): string
    {
        return $this->inflector->singular($value);
    }

    /**
     * Transiterate sentence for url.
     *
     * @param string $sentence
     * @param string $delimiter
     *
     * @return mixed
     */
    public function slug(string $sentence, string $delimiter = '-'): string
    {
        return $this->inflector->slug($sentence, $delimiter);
    }
}