<?php
declare(strict_types=1);

namespace Noldors\Inflect\Inflectors;

/**
 * Rules based on ICanBoogie inflector @see https://github.com/ICanBoogie/Inflector/blob/master/LICENSE
 * @package Noldors\Inflect\Inflectors
 */
class FrenchInflector extends BaseInflector
{
    protected $pluralRules = [
        '/(s|x|z)$/ui'                                               => '\1',
        '/(b|cor|ém|gemm|soupir|trav|vant|vitr)ail$/ui'              => '\1aux',
        '/ail$/ui'                                                   => 'ails',
        '/al$/ui'                                                    => 'aux',
        '/(bleu|émeu|landau|lieu|pneu|sarrau)$/ui'                   => '\1s',
        '/(bijou|caillou|chou|genou|hibou|joujou|pou|au|eu|eau)$/ui' => '\1x',
        '/$/uiu'                                                      => 's'
    ];

    protected $pluralIrregular = [
        'mademoiselle' => 'mesdemoiselles',
        'madame'       => 'mesdames',
        'monsieur'     => 'messieurs'
    ];

    protected $singularRules = [
        '/(b|cor|ém|gemm|soupir|trav|vant|vitr)aux$/ui'               => '\1ail',
        '/ails$/ui'                                                   => 'ail',
        '/(journ|chev)aux$/ui'                                        => '\1al',
        '/(bijou|caillou|chou|genou|hibou|joujou|pou|au|eu|eau)x$/ui' => '\1',
        '/s$/ui'                                                      => ''
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