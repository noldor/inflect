<?php
declare(strict_types=1);

namespace Noldors\Inflect\Inflectors;

use Noldors\Inflect\Contracts\InflectorInterface;

/**
 * Used for languages, that have not normal inflector so far.
 *
 * @package Noldors\Inflect\Inflectors
 */
class UndefinedInflector implements InflectorInterface
{

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
        return $word;
    }

    /**
     * Get the singular form of an English word
     *
     * @param string $word
     *
     * @return string
     */
    public function singular(string $word): string
    {
        return $word;
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
            \Transliterator::createFromRules(':: Any-Lower; :: Latin-ASCII; :: Any-Publishing; :: Any-NFKC; :: NFC;')
                ->transliterate(trim($sentence)));
    }
}
