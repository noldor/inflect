<?php
declare(strict_types=1);

namespace Noldors\Inflect\Inflectors;

/**
 * Rules based on ICanBoogie inflector @see https://github.com/ICanBoogie/Inflector/blob/master/LICENSE
 * @package Noldors\Inflect\Inflectors
 */
class SpanishInflector extends BaseInflector
{
    protected $pluralRules = [
        '/ú([sn])$/ui'     => 'u\1es',
        '/ó([sn])$/ui'     => 'o\1es',
        '/í([sn])$/ui'     => 'i\1es',
        '/é([sn])$/ui'     => 'e\1es',
        '/á([sn])$/ui'     => 'a\1es',
        '/z$/ui'           => 'ces',
        '/([aeiou]s)$/ui'  => '\1',
        '/([^aeéiou])$/ui' => '\1es',
        '/(.+)$/ui'         => '\1s'
    ];

    protected $pluralIrregular = [
        'el'           => 'los',
        'lunes'        => 'lunes',
        'rompecabezas' => 'rompecabezas',
        'crisis'       => 'crisis',
        'papá'         => 'papás',
        'mamá'         => 'mamás',
        'sofá'         => 'sofás',
        'mes'          => 'meses'
    ];

    protected $singularRules = [
        '/ereses$/ui' => 'erés',
        '/iones$/ui'  => 'ión',
        '/ces$/ui'    => 'z',
        '/es$/ui'     => '',
        '/(.+)s$/ui'  => '\1'
    ];

    protected $singularIrregular = [
        'los'          => 'el',
        'lunes'        => 'lunes',
        'rompecabezas' => 'rompecabezas',
        'crisis'       => 'crisis',
        'papás'        => 'papá',
        'mamás'        => 'mamá',
        'sofás'        => 'sofá',
        'meses'        => 'mes'
    ];

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
