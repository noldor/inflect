<?php
declare(strict_types=1);

namespace Noldors\Inflect\Inflectors;

use Noldors\Inflect\Contracts\InflectorInterface;

/**
 * Rules based on Doctrine inflector @see https://github.com/doctrine/inflector/blob/master/LICENSE
 * @package Noldors\Helpers\Inflector
 */
class EnglishInflector implements InflectorInterface
{

    /**
     * Plural rules.
     *
     * @var array
     */
    private $pluralRules = [
        '/(s)tatus$/i'                                                           => '\1\2tatuses',
        '/(quiz)$/i'                                                             => '\1zes',
        '/^(ox)$/i'                                                              => '\1\2en',
        '/([m|l])ouse$/i'                                                        => '\1ice',
        '/(matr|vert|ind)(ix|ex)$/i'                                             => '\1ices',
        '/(x|ch|ss|sh)$/i'                                                       => '\1es',
        '/([^aeiouy]|qu)y$/i'                                                    => '\1ies',
        '/(hive)$/i'                                                             => '\1s',
        '/(?:([^f])fe|([lr])f)$/i'                                               => '\1\2ves',
        '/sis$/i'                                                                => 'ses',
        '/([ti])um$/i'                                                           => '\1a',
        '/(p)erson$/i'                                                           => '\1eople',
        '/(m)an$/i'                                                              => '\1en',
        '/(c)hild$/i'                                                            => '\1hildren',
        '/(f)oot$/i'                                                             => '\1eet',
        '/(buffal|her|potat|tomat|volcan)o$/i'                                   => '\1\2oes',
        '/(alumn|bacill|cact|foc|fung|nucle|radi|stimul|syllab|termin|vir)us$/i' => '\1i',
        '/us$/i'                                                                 => 'uses',
        '/(alias)$/i'                                                            => '\1es',
        '/(analys|ax|cris|test|thes)is$/i'                                       => '\1es',
        '/s$/'                                                                   => 's',
        '/^$/'                                                                   => '',
        '/$/'                                                                    => 's',
    ];

    /**
     * Plural uninflected rules.
     *
     * @var string
     */
    private $pluralUninflected = '/^((?:.*[nrlm]ese|.*deer|.*fish|.*measles|.*ois|.*pox|.*sheep|people|cookie|Amoyese|bison|Borghese|bream|breeches|britches|buffalo|cantus|carp|chassis|clippers|cod|coitus|Congoese|contretemps|corps|debris|diabetes|djinn|eland|elk|equipment|Faroese|flounder|Foochowese|gallows|Genevese|Genoese|Gilbertese|graffiti|headquarters|herpes|hijinks|Hottentotese|information|innings|jackanapes|Kiplingese|Kongoese|Lucchese|mackerel|Maltese|.*?media|mews|moose|mumps|Nankingese|news|nexus|Niasese|Pekingese|Piedmontese|pincers|Pistoiese|pliers|Portuguese|proceedings|rabies|rice|rhinoceros|salmon|Sarawakese|scissors|sea[- ]bass|series|Shavese|shears|siemens|species|staff|swine|testes|trousers|trout |tuna|Vermontese|Wenchowese|whiting|wildebeest|Yengeese))$/i';

    /**
     * Plural irregular words.
     * @var array
     */
    private $pluralIrregular = [
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
    private $singularRules = [
        '/(s)tatuses$/i'                                                          => '\1\2tatus',
        '/^(.*)(menu)s$/i'                                                        => '\1\2',
        '/(quiz)zes$/i'                                                           => '\\1',
        '/(matr)ices$/i'                                                          => '\1ix',
        '/(vert|ind)ices$/i'                                                      => '\1ex',
        '/^(ox)en/i'                                                              => '\1',
        '/(alias)(es)*$/i'                                                        => '\1',
        '/(buffal|her|potat|tomat|volcan)oes$/i'                                  => '\1o',
        '/(alumn|bacill|cact|foc|fung|nucle|radi|stimul|syllab|termin|viri?)i$/i' => '\1us',
        '/([ftw]ax)es/i'                                                          => '\1',
        '/(analys|ax|cris|test|thes)es$/i'                                        => '\1is',
        '/(shoe|slave)s$/i'                                                       => '\1',
        '/(o)es$/i'                                                               => '\1',
        '/ouses$/'                                                                => 'ouse',
        '/([^a])uses$/'                                                           => '\1us',
        '/([m|l])ice$/i'                                                          => '\1ouse',
        '/(x|ch|ss|sh)es$/i'                                                      => '\1',
        '/(m)ovies$/i'                                                            => '\1\2ovie',
        '/(s)eries$/i'                                                            => '\1\2eries',
        '/([^aeiouy]|qu)ies$/i'                                                   => '\1y',
        '/([lr])ves$/i'                                                           => '\1f',
        '/(tive)s$/i'                                                             => '\1',
        '/(hive)s$/i'                                                             => '\1',
        '/(drive)s$/i'                                                            => '\1',
        '/([^fo])ves$/i'                                                          => '\1fe',
        '/(^analy)ses$/i'                                                         => '\1sis',
        '/(analy|diagno|^ba|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/i'             => '\1\2sis',
        '/([ti])a$/i'                                                             => '\1um',
        '/(p)eople$/i'                                                            => '\1\2erson',
        '/(m)en$/i'                                                               => '\1an',
        '/(c)hildren$/i'                                                          => '\1\2hild',
        '/(f)eet$/i'                                                              => '\1oot',
        '/(n)ews$/i'                                                              => '\1\2ews',
        '/eaus$/'                                                                 => 'eau',
        '/^(.*us)$/'                                                              => '\\1',
        '/s$/i'                                                                   => '',
    ];

    /**
     * Singular uninflected rules.
     *
     * @var string
     */
    private $singularUninflected = '/^((?:.*[nrlm]ese|.*deer|.*fish|.*measles|.*ois|.*pox|.*sheep|.*ss|Amoyese|bison|Borghese|bream|breeches|britches|buffalo|cantus|carp|chassis|clippers|cod|coitus|Congoese|contretemps|corps|debris|diabetes|djinn|eland|elk|equipment|Faroese|flounder|Foochowese|gallows|Genevese|Genoese|Gilbertese|graffiti|headquarters|herpes|hijinks|Hottentotese|information|innings|jackanapes|Kiplingese|Kongoese|Lucchese|mackerel|Maltese|.*?media|mews|moose|mumps|Nankingese|news|nexus|Niasese|Pekingese|Piedmontese|pincers|Pistoiese|pliers|Portuguese|proceedings|rabies|rice|rhinoceros|salmon|Sarawakese|scissors|sea[- ]bass|series|Shavese|shears|siemens|species|staff|swine|testes|trousers|trout |tuna|Vermontese|Wenchowese|whiting|wildebeest|Yengeese))$/i';

    /**
     * Singular irregular words.
     *
     * @var array
     */
    private $singularIrregular = [
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
     * Plural cache.
     *
     * @var array
     */
    private $cachePlural = [];

    /**
     * Singular cache.
     *
     * @var array
     */
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
    public function slug(string $sentence, string $delimiter = '-'): string
    {
        return preg_replace(['/([^[a-zA-Z0-9-_])/', '/-{2,}/'], $delimiter,
            \Transliterator::createFromRules(':: NFD; :: Any-Lower; :: Any-Publishing; :: Any-NFKC; :: NFC;')->transliterate($sentence));
    }

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

        if (preg_match($this->pluralUninflected, $word)) {
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

        if (preg_match($this->singularUninflected, $word)) {
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