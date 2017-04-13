<?php
declare(strict_types=1);

namespace Noldors\Inflect\Contracts;

/**
 * Used for classes, that used in inflector.
 * @package Noldors\Contacts
 */
interface InflectorInterface
{
    /**
     * Get the plural form of word.
     *
     * @param string $word
     * @param int    $count
     *
     * @return string
     */
    public function plural(string $word, int $count): string;

    /**
     * Get the singular form of an English word
     *
     * @param string $word
     *
     * @return string
     */
    public function singular(string $word): string;

    /**
     * Transliterate sentence for url
     *
     * @param string $sentence
     * @param string $delimiter
     *
     * @return string
     */
    public function slug(string $sentence, string $delimiter = '-');
}