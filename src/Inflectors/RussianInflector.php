<?php
declare(strict_types=1);

namespace Noldors\Inflect\Inflectors;

use Noldors\Inflect\Contracts\InflectorInterface;

/**
 * @package Noldors\Helpers\Inflector
 */
class RussianInflector implements InflectorInterface
{
    /**
     * Used to determine that count is 1, 21, 31 and so on.
     */
    const ONE = 1;

    /**
     * Used to determine that count is 2, 3, 4, 23, 24, 32, 34 and so on.
     */
    const SOME = 2;

    /**
     * Used to determine that count is any other number.
     */
    const MANY = 3;

    /**
     * Plural inflector rules.
     *
     * @var array
     */
    private $plural = [
        '/(^век)$/ui'                              => ['\1а', '\1ов'],
        '/(.*яц)/ui'                               => ['\1а', '\1ев'],
        '/(.*ни)е$/ui'                             => ['\1я', '\1й'],
        '/(.*(?:иц|ст|аз|ов|ел|ек|раз))(?:о|)$/ui' => ['\1а', '\1'],
        '/(.*)ьмо$/ui'                             => ['\1ьма', '\1ем'],
        '/(.*)ок$/ui'                              => ['\1ка', '\1ков'],
        '/(.*)я$/ui'                               => ['\1и', '\1й'],
        '/(.*)це$/ui'                              => ['\1ца', '\1ец'],
        '/(.*)ец$/ui'                              => ['\1ца', '\1цов'],
        '/(.*а)й$/ui'                              => ['\1я', '\1ев'],
        '/(.*(?:ов|м|ин|т|нд))а$/ui'               => ['\1ы', '\1'],
        '/(.*)а$/ui'                               => ['\1и', '\1'],
        '/(.*л)ь$/ui'                              => ['\1я', '\1ей'],
        '/(.*(?:н|т))ь$/ui'                        => ['\1и', '\1ей'],
        '/(.*)г$/ui'                               => ['\1га', '\1зей'],
        '/(.+)$/ui'                                => ['\1а', '\1ов'],
    ];

    private $pluralIrregular = [
        'год'     => [
            'rule'         => '/(.+)/ui',
            'replacements' => ['\1а', 'лет']
        ],
        'ребёнок' => [
            'rule'         => '/(ребён)ок$/ui',
            'replacements' => ['\1ка', 'детей']
        ],
        'ребенок' => [
            'rule'         => '/(ребен)ок$/ui',
            'replacements' => ['\1ка', 'детей']
        ],
    ];

    /**
     * Singular inflector rules.
     *
     * @var array
     */
    private $singular = [
        'rules'     => [
            '/(.*д)(?:ец|ца)$/ui'                              => '\1це',
            '/(.*с)(?:ем|ьма)$/ui'                             => '\1ьмо',
            '/(.*ци)(?:й|и|я)$/ui'                             => '\1я',
            '/(.*и)(?:й|я)$/ui'                                => '\1е',
            '/(.*н)(?:цов|ца)$/ui'                             => '\1ец',
            '/(.*а)(?:ев|я)$/ui'                               => '\1й',
            '/(.*)(?:зей)$/ui'                                 => '\1г',
            '/(.*н)(?:ка|ков)$/ui'                             => '\1ок',
            '/(.*(?:ук|олов|ем|ин|яч|рм|ут|нд))(?:и|а|ы|)$/ui' => '\1а',
            '/(.*(?:ел|лов|ест|иц))(?:а|)$/ui'                 => '\1о',
            '/(.*)(?:я|ей|и)$/ui'                              => '\1ь',
            '/(.*)(?:а|ов|ев)$/ui'                             => '\1',
        ],
        'irregular' => [
            'лет'   => 'год',
            'детей' => 'ребенок'
        ]
    ];

    private $cachePlural = [];

    private $cacheSingular = [];

    /**
     * Get the plural form of word.
     *
     * @param string $word
     * @param int    $count
     *
     * @return string
     */
    public function plural(string $word, int $count): string
    {
        $amount = $this->detectAmount($count);

        if ($amount === self::ONE) {
            return $word;
        }

        if (isset($this->cachePlural[$word][$amount])) {
            return $this->cachePlural[$word][$amount];
        } else {
            return $this->pluralizeWord($word, $amount);
        }
    }

    /**
     * Returns a word in singular form.
     *
     * @param string $word The word in plural form.
     *
     * @return string The word in singular form.
     */
    public function singular(string $word): string
    {
        if (isset($this->cacheSingular[$word])) {
            return $this->cacheSingular[$word];
        } else {
            return $this->singularizeWord($word);
        }
    }

    /**
     * Transliterate sentence for url
     *
     * @param string $sentence
     * @param string $delimiter
     *
     * @return string
     */
    public function slug(string $sentence, string $delimiter = '-'): string
    {
        return preg_replace(
            ['/[^[a-zA-Z0-9-_ ]/u', '/\s/u', "/$delimiter{2,}/u"],
            ['', $delimiter, $delimiter],
            \Transliterator::createFromRules(':: Any-Lower; :: Russian-Latin/BGN; :: Any-Publishing; :: Any-NFKC; :: NFC;')
                ->transliterate(trim($sentence)));
    }

    /**
     * Determine amount of given number.
     *
     * @param int $count
     *
     * @return int
     */
    private function detectAmount(int $count): int
    {
        if ((($count % 10) === 1) && (($count % 100) !== 11)) {
            return self::ONE;
        } elseif (
            (($count % 10) >= 2)
            && (($count % 10) <= 4)
            && ((($count % 100) < 10) || ($count % 100) >= 20)
        ) {
            return self::SOME;
        } else {
            return self::MANY;
        }
    }

    /**
     * Pluralize word if amount SOME or MANY.
     *
     * @param string $word
     * @param int    $amount
     *
     * @return string
     */
    private function pluralizeWord(string $word, int $amount): string
    {
        if (array_key_exists($word, $this->pluralIrregular)) {
            return $this->pluralWithAmount(
                $word,
                $amount,
                $this->pluralIrregular[$word]['rule'],
                $this->pluralIrregular[$word]['replacements']
            );
        }

        foreach ($this->plural as $rule => $replacements) {
            if (preg_match($rule, $word)) {
                return $this->pluralWithAmount(
                    $word,
                    $amount,
                    $rule,
                    $replacements
                );
            }
        }

        // No matches so return basic form.
        return $word;
    }

    /**
     * Make plural form of word based of it amount.
     *
     * @param string $word
     * @param int    $amount
     * @param string $rule
     * @param array  $replacements
     *
     * @return string
     */
    protected function pluralWithAmount(
        string $word,
        int $amount,
        string $rule,
        array $replacements
    ): string {
        if ($amount === self::SOME) {
            return $this->cachePlural[$word][self::SOME] = preg_replace(
                $rule,
                $replacements[0],
                $word
            );
        } else {
            return $this->cachePlural[$word][self::MANY] = preg_replace(
                $rule,
                $replacements[1],
                $word
            );
        }
    }

    /**
     * Singularize word.
     *
     * @param string $word
     *
     * @return string
     */
    private function singularizeWord(string $word): string
    {
        if (array_key_exists($word, $this->singular['irregular'])) {
            $this->cacheSingular[$word] = $this->singular['irregular'][$word];

            return $this->cacheSingular[$word];
        }

        foreach ($this->singular['rules'] as $rule => $replacement) {
            if (preg_match($rule, $word)) {
                $this->cacheSingular[$word] = preg_replace($rule, $replacement, $word);

                return $this->cacheSingular[$word];
            }
        }

        $this->cacheSingular[$word] = $word;

        return $word;
    }
}