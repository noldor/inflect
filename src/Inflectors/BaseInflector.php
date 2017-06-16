<?php
declare(strict_types=1);

namespace Noldors\Inflect\Inflectors;

use Noldors\Inflect\Contracts\InflectorInterface;

abstract class BaseInflector implements InflectorInterface
{
    protected $pluralRules = [];

    protected $pluralUninflected = null;

    protected $pluralIrregular = [];

    protected $singularRules = [];

    protected $singularUninflected = null;

    protected $singularIrregular = [];
    /**
     * Plural cache.
     *
     * @var array
     */
    protected $cachePlural = [];

    /**
     * Singular cache.
     *
     * @var array
     */
    protected $cacheSingular = [];

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
        if (empty($word)) {
            return $word;
        }

        if (isset($this->cachePlural[$word])) {
            return $this->cachePlural[$word];
        }

        return $this->pluralizeWord($word);
    }

    /**
     * Get the singular form of word.
     *
     * @param string $word
     *
     * @return string
     */
    public function singular(string $word): string
    {
        if (empty($word)) {
            return $word;
        }

        if (isset($this->cacheSingular[$word])) {
            return $this->cacheSingular[$word];
        }

        return $this->singularizeWord($word);
    }

    /**
     * Transliterate sentence for url
     *
     * @param string $sentence
     * @param string $delimiter
     *
     * @return string
     */
    abstract public function slug(string $sentence, string $delimiter = '-'): string;

    /**
     * @param string $word
     *
     * @return string
     */
    private function pluralizeWord(string $word): string
    {
        if (array_key_exists($word, $this->pluralIrregular)) {
            return $this->cachePlural[$word] = $this->pluralIrregular[$word];
        }

        if (!is_null($this->pluralUninflected) && preg_match($this->pluralUninflected, $word)) {
            return $this->cachePlural[$word] = $word;
        }

        return $this->pluralizeByRules($word);
    }

    /**
     * @param string $word
     *
     * @return string
     */
    private function pluralizeByRules(string $word): string
    {
        foreach ($this->pluralRules as $rule => $replacement) {
            if (preg_match($rule, $word)) {
                $this->cachePlural[$word] = preg_replace($rule, $replacement, $word);
                break;
            }
        }

        return $this->cachePlural[$word];
    }

    /**
     * @param string $word
     *
     * @return string
     */
    private function singularizeWord(string $word): string
    {
        if (array_key_exists($word, $this->singularIrregular)) {
            return $this->cacheSingular[$word] = $this->singularIrregular[$word];
        }

        if (!is_null($this->singularUninflected) && preg_match($this->singularUninflected, $word)) {
            return $this->cacheSingular[$word] = $word;
        }

        foreach ($this->singularRules as $rule => $replacement) {
            if (preg_match($rule, $word)) {
                return $this->cacheSingular[$word] = preg_replace($rule, $replacement, $word);
            }
        }

        $this->cacheSingular[$word] = $word;

        return $word;
    }
}
