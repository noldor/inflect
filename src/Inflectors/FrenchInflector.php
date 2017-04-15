<?php
declare(strict_types=1);

namespace Noldors\Inflect\Inflectors;

class FrenchInflector extends BaseInflector
{
    protected $pluralRules = [
        '/(s|x|z)$/'                                               => '\1',
        '/(b|cor|ém|gemm|soupir|trav|vant|vitr)ail$/'              => '\1aux',
        '/ail$/'                                                   => 'ails',
        '/al$/'                                                    => 'aux',
        '/(bleu|émeu|landau|lieu|pneu|sarrau)$/'                   => '\1s',
        '/(bijou|caillou|chou|genou|hibou|joujou|pou|au|eu|eau)$/' => '\1x',
        '/$/'                                                      => 's'
    ];

    protected $pluralIrregular = [
        'mademoiselle' => 'mesdemoiselles',
        'madame'       => 'mesdames',
        'monsieur'     => 'messieurs'
    ];

    protected $singularRules = [
        '/(b|cor|ém|gemm|soupir|trav|vant|vitr)aux$/'               => '\1ail',
        '/ails$/'                                                   => 'ail',
        '/(journ|chev)aux$/'                                        => '\1al',
        '/(bijou|caillou|chou|genou|hibou|joujou|pou|au|eu|eau)x$/' => '\1',
        '/s$/'                                                      => ''
    ];

    protected $singularIrregular = [
        'mesdemoiselles' => 'mademoiselle',
        'mesdames'       => 'madame',
        'messieurs'      => 'monsieur'
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