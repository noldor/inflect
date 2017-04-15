<?php
declare(strict_types=1);

namespace Noldors\Inflect;

use Noldors\Inflect\Contracts\InflectorInterface;
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

    /**
     * Set default locale for scripts.
     *
     * @param \Noldors\Inflect\Contracts\InflectorInterface|null $inflector
     */
    public function __construct(InflectorInterface $inflector = null)
    {
        if (is_null($inflector)) {
            $this->inflector = new UndefinedInflector();
        } else {
            $this->inflector = $inflector;
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