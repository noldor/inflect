<?php
declare(strict_types=1);

namespace Noldors\Inflect\Inflectors;

/**
 * Rules based on ICanBoogie inflector @see https://github.com/ICanBoogie/Inflector/blob/master/LICENSE
 * @package Noldors\Inflect\Inflectors
 */
class PortugueseInflector extends BaseInflector
{
    protected $pluralRules = [
        '/^(.*)ão$/ui'         => '\1ões',
        '/^(.*)([rsz])$/ui'    => '\1\2es',
        '/^(.*)([aeou])l$/ui' => '\1\2is',
        '/^(.*)il$/ui'         => '\1\2is',
        '/^(.*)([mn])$/ui'      => '\1ns',
        '/^(.*)$/ui'           => '\1s',
    ];

    protected $pluralUninflected = '/^((?:atlas|lapis|onibus|pires|virus|status))$/ui';

    protected $pluralIrregular = [
        'abdomen'   => 'abdomens',
        'alemão'    => 'alemães',
        'artesã'    => 'artesãos',
        'ás'        => 'áses',
        'bencão'    => 'bencãos',
        'cão'       => 'cães',
        'campus'    => 'campi',
        'capelão'   => 'capelães',
        'capitão'   => 'capitães',
        'chão'      => 'chãos',
        'charlatão' => 'charlatães',
        'cidadão'   => 'cidadãos',
        'consul'    => 'consules',
        'cristão'   => 'cristãos',
        'difícil'   => 'difíceis',
        'email'     => 'emails',
        'escrivão'  => 'escrivães',
        'fóssil'    => 'fósseis',
        'germens'   => 'germen',
        'grão'      => 'grãos',
        'hífen'     => 'hífens',
        'irmão'     => 'irmãos',
        'liquens'   => 'liquen',
        'mal'       => 'males',
        'mão'       => 'mãos',
        'orfão'     => 'orfãos',
        'país'      => 'países',
        'pai'       => 'pais',
        'pão'       => 'pães',
        'projétil'  => 'projéteis',
        'réptil'    => 'répteis',
        'sacristão' => 'sacristães',
        'sotão'     => 'sotãos',
        'tabelião'  => 'tabeliães',
        'gás'       => 'gases',
        'álcool'    => 'álcoois',
    ];

    protected $singularRules = [
        '/^(.*)ões$/ui'         => '\1ão',
        '/^(.*)([rsz])es$/ui'   => '\1\2',
        '/^(.*)([aeou])is$/ui' => '\1\2l',
        '/^(.*)is$/ui'          => '\1\2il',
        '/^(.*)ns$/ui'          => '\1m',
        '/^(.*)s$/ui'           => '\1',
    ];

    protected $singularIrregular = [
        'abdomens'   => 'abdomen',
        'alemães'    => 'alemão',
        'artesãos'   => 'artesã',
        'áses'       => 'ás',
        'bencãos'    => 'bencão',
        'cães'       => 'cão',
        'campi'      => 'campus',
        'capelães'   => 'capelão',
        'capitães'   => 'capitão',
        'chãos'      => 'chão',
        'charlatães' => 'charlatão',
        'cidadãos'   => 'cidadão',
        'consules'   => 'consul',
        'cristãos'   => 'cristão',
        'difíceis'   => 'difícil',
        'emails'     => 'email',
        'escrivães'  => 'escrivão',
        'fósseis'    => 'fóssil',
        'germen'     => 'germens',
        'grãos'      => 'grão',
        'hífens'     => 'hífen',
        'irmãos'     => 'irmão',
        'liquen'     => 'liquens',
        'males'      => 'mal',
        'mãos'       => 'mão',
        'orfãos'     => 'orfão',
        'países'     => 'país',
        'pais'       => 'pai',
        'pães'       => 'pão',
        'projéteis'  => 'projétil',
        'répteis'    => 'réptil',
        'sacristães' => 'sacristão',
        'sotãos'     => 'sotão',
        'tabeliães'  => 'tabelião',
        'gases'      => 'gás',
        'álcoois'    => 'álcool',
    ];

    protected $singularUninflected = '/^((?:atlas|lapis|onibus|pires|virus|status))$/ui';

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
