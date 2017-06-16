<?php
declare(strict_types=1);

namespace Noldors\Inflect\Inflectors;

/**
 * Rules based on Doctrine inflector @see https://github.com/doctrine/inflector/blob/master/LICENSE
 * @package Noldors\Helpers\Inflector
 */
class EnglishInflector extends BaseInflector
{

    /**
     * Plural rules.
     *
     * @var array
     */
    protected $pluralRules = [
        '/(s)tatus$/ui'                                                           => '\1\2tatuses',
        '/(quiz)$/ui'                                                             => '\1zes',
        '/^(ox)$/ui'                                                              => '\1\2en',
        '/([m|l])ouse$/ui'                                                        => '\1ice',
        '/(matr|vert|ind)(ix|ex)$/ui'                                             => '\1ices',
        '/(x|ch|ss|sh)$/ui'                                                       => '\1es',
        '/([^aeiouy]|qu)y$/ui'                                                    => '\1ies',
        '/(hive)$/i'                                                              => '\1s',
        '/(?:([^f])fe|([lr])f)$/ui'                                               => '\1\2ves',
        '/sis$/ui'                                                                => 'ses',
        '/([ti])um$/ui'                                                           => '\1a',
        '/(p)erson$/ui'                                                           => '\1eople',
        '/(m)an$/ui'                                                              => '\1en',
        '/(c)hild$/ui'                                                            => '\1hildren',
        '/(f)oot$/ui'                                                             => '\1eet',
        '/(buffal|her|potat|tomat|volcan)o$/ui'                                   => '\1\2oes',
        '/(alumn|bacill|cact|foc|fung|nucle|radi|stimul|syllab|termin|vir)us$/ui' => '\1i',
        '/us$/ui'                                                                 => 'uses',
        '/(alias)$/ui'                                                            => '\1es',
        '/(analys|ax|cris|test|thes)is$/ui'                                       => '\1es',
        '/s$/ui'                                                                  => 's',
        '/^$/ui'                                                                  => '',
        '/$/ui'                                                                   => 's',
    ];

    /**
     * Plural uninflected rules.
     *
     * @var string
     */
    protected $pluralUninflected = '/^((?:.*[nrlm]ese|.*deer|.*fish|.*measles|.*ois|.*pox|.*sheep|people|cookie|Amoyese|bison|Borghese|bream|breeches|britches|buffalo|cantus|carp|chassis|clippers|cod|coitus|Congoese|contretemps|corps|debris|diabetes|djinn|eland|elk|equipment|Faroese|flounder|Foochowese|gallows|Genevese|Genoese|Gilbertese|graffiti|headquarters|herpes|hijinks|Hottentotese|information|innings|jackanapes|Kiplingese|Kongoese|Lucchese|mackerel|Maltese|.*?media|mews|moose|mumps|Nankingese|news|nexus|Niasese|Pekingese|Piedmontese|pincers|Pistoiese|pliers|Portuguese|proceedings|rabies|rice|rhinoceros|salmon|Sarawakese|scissors|sea[- ]bass|series|Shavese|shears|siemens|species|staff|swine|testes|trousers|trout |tuna|Vermontese|Wenchowese|whiting|wildebeest|Yengeese))$/ui';

    /**
     * Plural irregular words.
     * @var array
     */
    protected $pluralIrregular = [
        'atlas'        => 'atlases',
        'axe'          => 'axes',
        'beef'         => 'beefs',
        'brother'      => 'brothers',
        'cafe'         => 'cafes',
        'chateau'      => 'chateaux',
        'child'        => 'children',
        'cookie'       => 'cookies',
        'corpus'       => 'corpuses',
        'cow'          => 'cows',
        'criterion'    => 'criteria',
        'curriculum'   => 'curricula',
        'demo'         => 'demos',
        'domino'       => 'dominoes',
        'echo'         => 'echoes',
        'foot'         => 'feet',
        'fungus'       => 'fungi',
        'ganglion'     => 'ganglions',
        'genie'        => 'genies',
        'genus'        => 'genera',
        'graffito'     => 'graffiti',
        'hippopotamus' => 'hippopotami',
        'hoof'         => 'hoofs',
        'human'        => 'humans',
        'iris'         => 'irises',
        'leaf'         => 'leaves',
        'loaf'         => 'loaves',
        'man'          => 'men',
        'medium'       => 'media',
        'memorandum'   => 'memoranda',
        'money'        => 'monies',
        'mongoose'     => 'mongooses',
        'motto'        => 'mottoes',
        'move'         => 'moves',
        'mythos'       => 'mythoi',
        'niche'        => 'niches',
        'nucleus'      => 'nuclei',
        'numen'        => 'numina',
        'occiput'      => 'occiputs',
        'octopus'      => 'octopuses',
        'opus'         => 'opuses',
        'ox'           => 'oxen',
        'penis'        => 'penises',
        'person'       => 'people',
        'plateau'      => 'plateaux',
        'runner-up'    => 'runners-up',
        'sex'          => 'sexes',
        'soliloquy'    => 'soliloquies',
        'son-in-law'   => 'sons-in-law',
        'syllabus'     => 'syllabi',
        'testis'       => 'testes',
        'thief'        => 'thieves',
        'tooth'        => 'teeth',
        'tornado'      => 'tornadoes',
        'trilby'       => 'trilbys',
        'turf'         => 'turfs',
        'volcano'      => 'volcanoes',
    ];

    /**
     * Singular rules.
     *
     * @var array
     */
    protected $singularRules = [
        '/(s)tatuses$/ui'                                                          => '\1\2tatus',
        '/^(.*)(menu)s$/ui'                                                        => '\1\2',
        '/(quiz)zes$/ui'                                                           => '\\1',
        '/(matr)ices$/ui'                                                          => '\1ix',
        '/(vert|ind)ices$/ui'                                                      => '\1ex',
        '/^(ox)en/ui'                                                              => '\1',
        '/(alias)(es)*$/ui'                                                        => '\1',
        '/(buffal|her|potat|tomat|volcan)oes$/ui'                                  => '\1o',
        '/(alumn|bacill|cact|foc|fung|nucle|radi|stimul|syllab|termin|viri?)i$/ui' => '\1us',
        '/([ftw]ax)es/ui'                                                          => '\1',
        '/(analys|ax|cris|test|thes)es$/ui'                                        => '\1is',
        '/(shoe|slave)s$/ui'                                                       => '\1',
        '/(o)es$/ui'                                                               => '\1',
        '/ouses$/ui'                                                               => 'ouse',
        '/([^a])uses$/ui'                                                          => '\1us',
        '/([m|l])ice$/ui'                                                          => '\1ouse',
        '/(x|ch|ss|sh)es$/ui'                                                      => '\1',
        '/(m)ovies$/ui'                                                            => '\1\2ovie',
        '/(s)eries$/ui'                                                            => '\1\2eries',
        '/([^aeiouy]|qu)ies$/ui'                                                   => '\1y',
        '/([lr])ves$/ui'                                                           => '\1f',
        '/(tive)s$/ui'                                                             => '\1',
        '/(hive)s$/ui'                                                             => '\1',
        '/(drive)s$/ui'                                                            => '\1',
        '/([^fo])ves$/ui'                                                          => '\1fe',
        '/(^analy)ses$/ui'                                                         => '\1sis',
        '/(analy|diagno|^ba|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/ui'             => '\1\2sis',
        '/([ti])a$/ui'                                                             => '\1um',
        '/(p)eople$/ui'                                                            => '\1\2erson',
        '/(m)en$/ui'                                                               => '\1an',
        '/(c)hildren$/ui'                                                          => '\1\2hild',
        '/(f)eet$/ui'                                                              => '\1oot',
        '/(n)ews$/ui'                                                              => '\1\2ews',
        '/eaus$/ui'                                                                => 'eau',
        '/^(.*us)$/ui'                                                             => '\\1',
        '/s$/ui'                                                                   => '',
    ];

    /**
     * Singular uninflected rules.
     *
     * @var string
     */
    protected $singularUninflected = '/^((?:.*[nrlm]ese|.*deer|.*fish|.*measles|.*ois|.*pox|.*sheep|.*ss|Amoyese|bison|Borghese|bream|breeches|britches|buffalo|cantus|carp|chassis|clippers|cod|coitus|Congoese|contretemps|corps|debris|diabetes|djinn|eland|elk|equipment|Faroese|flounder|Foochowese|gallows|Genevese|Genoese|Gilbertese|graffiti|headquarters|herpes|hijinks|Hottentotese|information|innings|jackanapes|Kiplingese|Kongoese|Lucchese|mackerel|Maltese|.*?media|mews|moose|mumps|Nankingese|news|nexus|Niasese|Pekingese|Piedmontese|pincers|Pistoiese|pliers|Portuguese|proceedings|rabies|rice|rhinoceros|salmon|Sarawakese|scissors|sea[- ]bass|series|Shavese|shears|siemens|species|staff|swine|testes|trousers|trout |tuna|Vermontese|Wenchowese|whiting|wildebeest|Yengeese))$/ui';

    /**
     * Singular irregular words.
     *
     * @var array
     */
    protected $singularIrregular = [
        'criteria'    => 'criterion',
        'curves'      => 'curve',
        'emphases'    => 'emphasis',
        'foes'        => 'foe',
        'hoaxes'      => 'hoax',
        'media'       => 'medium',
        'neuroses'    => 'neurosis',
        'waves'       => 'wave',
        'oases'       => 'oasis',
        'atlases'     => 'atlas',
        'axes'        => 'axe',
        'beefs'       => 'beef',
        'brothers'    => 'brother',
        'cafes'       => 'cafe',
        'chateaux'    => 'chateau',
        'children'    => 'child',
        'cookies'     => 'cookie',
        'corpuses'    => 'corpus',
        'cows'        => 'cow',
        'curricula'   => 'curriculum',
        'demos'       => 'demo',
        'dominoes'    => 'domino',
        'echoes'      => 'echo',
        'feet'        => 'foot',
        'fungi'       => 'fungus',
        'ganglions'   => 'ganglion',
        'genies'      => 'genie',
        'genera'      => 'genus',
        'graffiti'    => 'graffito',
        'hippopotami' => 'hippopotamus',
        'hoofs'       => 'hoof',
        'humans'      => 'human',
        'irises'      => 'iris',
        'leaves'      => 'leaf',
        'loaves'      => 'loaf',
        'men'         => 'man',
        'memoranda'   => 'memorandum',
        'monies'      => 'money',
        'mongooses'   => 'mongoose',
        'mottoes'     => 'motto',
        'moves'       => 'move',
        'mythoi'      => 'mythos',
        'niches'      => 'niche',
        'nuclei'      => 'nucleus',
        'numina'      => 'numen',
        'occiputs'    => 'occiput',
        'octopuses'   => 'octopus',
        'opuses'      => 'opus',
        'oxen'        => 'ox',
        'penises'     => 'penis',
        'people'      => 'person',
        'plateaux'    => 'plateau',
        'runners-up'  => 'runner-up',
        'sexes'       => 'sex',
        'soliloquies' => 'soliloquy',
        'sons-in-law' => 'son-in-law',
        'syllabi'     => 'syllabus',
        'testes'      => 'testis',
        'thieves'     => 'thief',
        'teeth'       => 'tooth',
        'tornadoes'   => 'tornado',
        'trilbys'     => 'trilby',
        'turfs'       => 'turf',
        'volcanoes'   => 'volcano',
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
            ['/[^a-zA-Z0-9-_ ]/u', '/\s/u', "/{$delimiter}{2,}/u"],
            ['', $delimiter, $delimiter],
            \Transliterator::createFromRules(':: NFD; :: Any-Lower; :: Any-Publishing; :: Any-NFKC; :: NFC;')
                ->transliterate(trim($sentence))
        );
    }
}
