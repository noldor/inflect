<?php
declare(strict_types=1);

namespace Noldors\Inflect\Inflectors;

use Noldors\Inflect\Contracts\InflectorInterface;

/**
 * @package Noldors\Helpers\Inflector
 */
class RussianInflector implements InflectorInterface
{
    /**
     * Used to determine that count is 1, 21, 31 and so on.
     */
    const ONE = 1;

    /**
     * Used to determine that count is 2, 3, 4, 23, 24, 32, 34 and so on.
     */
    const SOME = 2;

    /**
     * Used to determine that count is any other number.
     */
    const MANY = 3;

    /**
     * Plural inflector rules.
     *
     * @var array
     */
    /*protected $pluralRules = [
        '/(^век)$/ui'                              => ['\1а', '\1ов'],
        '/(.*яц)/ui'                               => ['\1а', '\1ев'],
        '/(.*ни)е$/ui'                             => ['\1я', '\1й'],
        '/(.*(?:иц|ст|аз|ов|ел|ек|раз))(?:о|)$/ui' => ['\1а', '\1'],
        '/(.*)ьмо$/ui'                             => ['\1ьма', '\1ем'],
        '/(.*)ок$/ui'                              => ['\1ка', '\1ков'],
        '/(.*)я$/ui'                               => ['\1и', '\1й'],
        '/(.*)це$/ui'                              => ['\1ца', '\1ец'],
        '/(.*)ец$/ui'                              => ['\1ца', '\1цов'],
        '/(.*а)й$/ui'                              => ['\1я', '\1ев'],
        '/(.*(?:ов|м|ин|т|нд))а$/ui'               => ['\1ы', '\1'],
        '/(.*)а$/ui'                               => ['\1и', '\1'],
        '/(.*л)ь$/ui'                              => ['\1я', '\1ей'],
        '/(.*(?:н|т))ь$/ui'                        => ['\1и', '\1ей'],
        '/(.*)г$/ui'                               => ['\1га', '\1зей'],
        '/(.+)$/ui'                                => ['\1а', '\1ов'],
    ];*/

    protected $pluralRules = [
        '/(.+)ой$/ui'                                                => ['\1ых', '\1ых'],
        '/(.+[иы])й$/ui'                                             => ['\1х', '\1х'],
        '/(.+(?:с))на$/ui'                                           => ['\1ны', '\1ен'],
        '/(.+(?:л))ьня$/ui'                                          => ['\1ьни', '\1ен'],
        '/(.+(?:в))но$/ui'                                           => ['\1на', '\1ен'],
        '/(.+(?:с|аш))ня$/ui'                                        => ['\1ни', '\1ен'],
        '/(.+ш)ня$/ui'                                               => ['\1ни', '\1ень'],
        '/(.+[^т])ень$/ui'                                           => ['\1ня', '\1ней'],
        '/(.+ге)р$/ui'                                               => ['\1ра', '\1ров'],
        '/(.+[бг])[оеё]р$/ui'                                        => ['\1ра', '\1ров'],
        '/(.+[лснр])я$/ui'                                           => ['\1и', '\1ь'],
        '/(.+)й$/ui'                                                 => ['\1я', '\1ев'],
        '/(.+)ы$/ui'                                                 => ['\1а', '\1ов'],
        '/(.+н)ин/ui'                                                => ['\1ина', '\1'],
        '/(.*(?:тв|жан|тел|бит|благ|люд|болот|жищ|рюх))(?:о|е|)$/ui' => ['\1а', '\1'],
        '/(.+(?:тик|ук|ек|ак|иш|рж|[аяуо]г|ох|ик))а$/ui'             => ['\1и', '\1'],
        '/(.+)йка$/ui'                                               => ['\1йки', '\1ек'],
        '/(.+(?:[шч]))ко$/ui'                                        => ['\1ка', '\1ек'],
        '/(.+(?:[чшж]))ка$/ui'                                       => ['\1ки', '\1ек'],
        '/(.+)ка$/ui'                                                => ['\1ки', '\1ок'],
        '/(.+(?:ст|рел|рол|хч|ат|еш|ов))[ьа]$/ui'                    => ['\1и', '\1ей'],
        '/(.+[хщ])а$/ui'                                             => ['\1и', '\1'],
        '/(.+)а$/ui'                                                 => ['\1ы', '\1'],
        '/(.*(?:бор|бен))ец$/ui'                                     => ['\1ца', '\1цов'],
        '/(.*бо)ец$/ui'                                              => ['\1йца', '\1йцов'],
        '/(.+(?:[иае]))ец$/ui'                                       => ['\1йца', '\1йцев'],
        '/(.+)це$/ui'                                                => ['\1ца', '\1ец'],
        '/(.+[^з][зрнмтс])ец$/ui'                                    => ['\1ца', '\1цев'],
        '/(.+[жшщч])$/ui'                                            => ['\1а', '\1ей'],
        '/(.+(?:[нздвлтшчм]и))е$/ui'                                 => ['\1я', '\1й'],
        '/я$/ui'                                                     => ['и', 'й'],
        '/(.*(?:сол|ртел|лоч|тер|езн|бол|вафл))[ья]$/ui'                     => ['\1и', '\1ей'],
        '/[еь]$/ui'                                                  => ['я', 'ей'],
        '/(.*васил)ек$/ui'                                 => ['\1ька', '\1ьков'],
        '/(.+[^б][^т])(?:ок|ек)$/ui'                                 => ['\1ка', '\1ков'],
        '/(.+)$/ui'                                                  => ['\1а', '\1ов'],
    ];

    protected $pluralIrregular = [
        'год'         => ['года', 'лет'],
        'ребёнок'     => ['ребёнка', 'детей'],
        'ребенок'     => ['ребенка', 'детей'],
        'абзац'       => ['абзаца', 'абзацев'],
        'абракадабра' => ['абракадабры', 'абракадабр'],
        'авоська'     => ['авоськи', 'авосек'],
        'аллейка'     => ['аллейки', 'аллеек'],
        'байка'       => ['байки', 'баек'],
        'банька'      => ['баньки', 'банек'],
        'бедро'       => ['бедра', 'бёдер'],
        'бой'         => ['боя', 'боёв'],
        'болгарин'    => ['болгарина', 'болгар'],
        'боярин'      => ['боярина', 'бояр'],
        'брат'        => ['брата', 'братьев'],
        'браток'      => ['братка', 'братков'],
        'брызги'      => ['брызг', 'брызг'],
        'брюки'       => ['брюк', 'брюк'],
        'бубен'       => ['бубна', 'бубнов'],
    ];

    protected $pluralUninflected = '/^(авто|авеню|агитпроп|агути|акко|актау|алиби|алоэ|амплуа|аэс|атташе|ателье|бюро|буратино|бридж|бренди|бигуди)$/ui';

    /**
     * Singular inflector rules.
     *
     * @var array
     */
    /*protected $singularRules = [
        '/(.*т)ик$/ui'                                                                 => '\1ика',
        '/(.+[^ч])(?:ки|ок|ка)$/ui'                                                    => '\1ка',
        '/(.*д)(?:ец|ца)$/ui'                                                          => '\1це',
        '/(.*с)(?:ем|ьма)$/ui'                                                         => '\1ьмо',
        '/(.*(?:ци|ри|ни|ли|фи))(?:й|и|я)$/ui'                                         => '\1я',
        '/(.*и)(?:й|я)$/ui'                                                            => '\1е',
        '/(.*)й(?:ца|цев)$/ui'                                                         => '\1ец',
        '/(.*)(?:цов|ца|цев)$/ui'                                                      => '\1ец',
        '/(.*а)(?:ев|я)$/ui'                                                           => '\1й',
        '/(.*)(?:зей)$/ui'                                                             => '\1г',
        '/(.*н)(?:ка|ков)$/ui'                                                         => '\1ок',
        '/(.*(?:ук|олов|ем|ин|яч|рм|ут|нд|тур|цен|тюр|рор|баз|роф|онн))(?:и|а|ы|)$/ui' => '\1а',
        '/(.*(?:ел|слов|ест|иц))(?:а|)$/ui'                                            => '\1о',
        '/(.*)(?:я|ей|и)$/ui'                                                          => '\1ь',
        '/(.*)(?:а|ов|ев)$/ui'                                                         => '\1',
    ];*/

    protected $singularRules = [
        '/(.+г)(?:ров|ра)$/ui' => '\1ор',
        '/(.+б)(?:нов|на)$/ui'                                   => '\1ен',
        '/(.+(?:зг|юк))$/ui'                                     => '\1и',
        '/(.+в)(?:ен|на)$/ui'                                    => '\1но',
        '/(.+льн)(?:ых)$/ui'                                     => '\1ой',
        '/(.+об)(?:ров|ра)$/ui'                                  => '\1ёр',
        '/(.+(?:юд|от))(?:ец|ца)$/ui'
                                                                 => '\1це',
        '/(.+л)ь?(?:ен|ни)$/ui'                                  => '\1ьня',
        '/(.+[шс])(?:ень|ни|ен)$/ui'                             => '\1ня',
        '/(.+(?:в|д))(?:ней|ня)$/ui'
                                                                 => '\1ень',
        '/(.+[аеу])(?:ек|йк[аи])$/ui'                             => '\1йка',
        '/(.+(?:иере|жни|гат[еы]|га|жу))(?:ев|й|я|х)/ui'               => '\1й',
        '/(.+(?:ннал|смент))(?:ов|а)/ui'                         => '\1ы',
        '/(.+(?:чан|мян|рман|ояр))$/ui'
                                                                 => '\1ин',
        '/(.+(?:гелоч|раш|иноч))(?:ков|ка|ек)$/ui'
                                                                 => '\1ек',
        '/(.*(?:рес|ач|ел|реж|ряд|бож|тин|чон|рос|рус|гор|быч))(?:ков|ка|ок)$/ui'
                                                                 => '\1ок',
        '/(.*(?:ств|тел|благ|люд|болот|рюх))а*$/ui'              => '\1о',
        '/(.*(?:ьиш|деч|ныш|рюш))(?:ек|ка)$/ui'
                                                                 => '\1ко',
        '/(.*(?:в|шти|уч|ян|ст|ер|ич|он|[кч]ан|им|еч|ат|^ар|нт|иш|ен|аб|оч|уш|дар|ал|ол|юш|яж|елоч|р[её]з|сед|зыр|бир|ндин|луз|ляш|ван|ляч|беж|род|розд|нож|рош|шюр|нет|буд|каш|бул|маж|син|тыл|хан))(?:ок|ка|ки|ек)$/ui'
                                                                 => '\1ка',
        '/(.*)[ей](?:ца|цев|цов)$/ui'                            => '\1ец',
        '/(.*[^и])(?:цов|ца|цев)$/ui'                            => '\1ец',
        '/(.+(?:овани|образи|плоди|прави|ссили|смерти|иени|вони|вени|души|деяни|олучи|разуми|роди|слови|жени|тояни|ухани|стви|пол|жищ|четани))(?:й|я|ей|а|)$/ui'
                                                                 => '\1е',
        '/(.+(?:и|лле|ине|ул|ус|ан|ын|атаре|гин|ур))(?:[ийья])$/ui' => '\1я',
        '/(.+(?:тер|[тлр]|лоч|езн|реш|ров|тен))(?:ей|и|я)$/ui'
                                                                 => '\1ь',
        '/(.*(?:т[ую]р|цен|рор|баз|роф|онн|[аи]тик|шин|рад|збук|иом|рис|кул|ебр|ебард|атив|зур|м[её]б|пул|фем|гин|^анкет|нкнот|енн|лоп|аорт|тек|рен|ренд|мад|арф|рид|астр|так|сфер|афер|ухт|чиц|аур|фиш|баб|ланд|ерин|лад|анд|арж|кад|несс|ахч|илл|бед|няг|олаг|здн|елоч|елуг|рез|рлог|сед|слиц|ниц|масс|ирж|итв|вотин|блох|лях|гем|диц|бомб|ород|родищ|розд|браг|гад|тин|дяг|техник|шюр|сник|букв|лав|бумаг))(?:а|ы|и|ей|)$/ui'
                                                                 => '\1а',
        '/(.+)(?:а|ов|ев|ей)$/ui'
                                                                 => '\1',
    ];

    protected $singularIrregular = [
        'лет'         => 'год',
        'детей'       => 'ребёнок',
        'абзаца'      => 'абзац',
        'абзацев'     => 'абзац',
        'абракадабры' => 'абракадабра',
        'абракадабр'  => 'абракадабра',
        'авоськи'     => 'авоська',
        'авосек'      => 'авоська',
        'аллейки'     => 'аллейка',
        'аллеек'      => 'аллейка',
        'багров'      => 'багор',
        'багра'       => 'багор',
        'баек'        => 'байка',
        'байки'       => 'байка',
        'баньки'      => 'банька',
        'банек'       => 'банька',
        'банок'       => 'банка',
        'бёдер'       => 'бедро',
        'бедра'       => 'бедро',
        'бахмачей'    => 'бахмач',
        'блесен'      => 'блесна',
        'блёсен'      => 'блесна',
        'блесны'      => 'блесна',
        'боев'        => 'бой',
        'боёв'        => 'бой',
        'боя'         => 'бой',
        'болгар'      => 'болгарин',
        'братьев'     => 'брат',
        'брата'       => 'брат',
        'братика'     => 'братик',
        'братка'      => 'браток',
        'братков'     => 'браток',


    ];

    protected $singularUninfleted = '/^(абзац|абракадабра|аллейка|авоська|авто|авеню|агитпроп|агути|акко|актау|алиби|алоэ|амплуа|аэс|атташе|ателье|байка|банька|бюро|буратино|бридж|бренди|блесна|богослов|братик|браток)$/ui';

    protected $cachePlural = [];

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
        $amount = $this->detectAmount($count);

        if ($amount === self::ONE || preg_match($this->pluralUninflected, $word)) {
            return $word;
        }

        if (isset($this->cachePlural[$word][$amount])) {
            return $this->cachePlural[$word][$amount];
        } else {
            return $this->pluralizeWord($word, $amount);
        }
    }

    /**
     * Returns a word in singular form.
     *
     * @param string $word The word in plural form.
     *
     * @return string The word in singular form.
     */
    public function singular(string $word): string
    {
        if (preg_match($this->singularUninfleted, $word)) {
            return $word;
        }

        if (isset($this->cacheSingular[$word])) {
            return $this->cacheSingular[$word];
        } else {
            return $this->singularizeWord($word);
        }
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
            \Transliterator::createFromRules(':: Any-Lower; :: Russian-Latin/BGN; :: Any-Publishing; :: Any-NFKC; :: NFC;')
                ->transliterate(trim($sentence)));
    }

    /**
     * Determine amount of given number.
     *
     * @param int $count
     *
     * @return int
     */
    private function detectAmount(int $count): int
    {
        if ((($count % 10) === 1) && (($count % 100) !== 11)) {
            return self::ONE;
        } elseif ((($count % 10) >= 2)
            && (($count % 10) <= 4)
            && ((($count % 100) < 10) || ($count % 100) >= 20)
        ) {
            return self::SOME;
        } else {
            return self::MANY;
        }
    }

    /**
     * Pluralize word if amount SOME or MANY.
     *
     * @param string $word
     * @param int    $amount
     *
     * @return string
     */
    private function pluralizeWord(string $word, int $amount): string
    {
        if (array_key_exists($word, $this->pluralIrregular)) {
            return $this->pluralIrregular(
                $word,
                $amount,
                $this->pluralIrregular[$word]
            );
        }

        foreach ($this->pluralRules as $rule => $replacements) {
            if (preg_match($rule, $word)) {
                return $this->pluralWithAmount(
                    $word,
                    $amount,
                    $rule,
                    $replacements
                );
            }
        }

        // No matches so return basic form.
        return $word;
    }

    /**
     * Make plural form of word based of it amount.
     *
     * @param string $word
     * @param int    $amount
     * @param string $rule
     * @param array  $replacements
     *
     * @return string
     */
    protected function pluralWithAmount(
        string $word,
        int $amount,
        string $rule,
        array $replacements
    ): string {
        if ($amount === self::SOME) {
            return $this->cachePlural[$word][self::SOME] = preg_replace(
                $rule,
                $replacements[0],
                $word
            );
        } else {
            return $this->cachePlural[$word][self::MANY] = preg_replace(
                $rule,
                $replacements[1],
                $word
            );
        }
    }

    /**
     * Get plural form of irregular word.
     *
     * @param string $word
     * @param int    $amount
     * @param array  $replacements
     *
     * @return string
     */
    protected function pluralIrregular(
        string $word,
        int $amount,
        array $replacements
    ): string {
        if ($amount === self::SOME) {
            return $this->cachePlural[$word][self::SOME] = $replacements[0];
        } else {
            return $this->cachePlural[$word][self::MANY] = $replacements[1];
        }
    }

    /**
     * Singularize word.
     *
     * @param string $word
     *
     * @return string
     */
    private function singularizeWord(string $word): string
    {
        if (array_key_exists($word, $this->singularIrregular)) {
            $this->cacheSingular[$word] = $this->singularIrregular[$word];

            return $this->cacheSingular[$word];
        }

        foreach ($this->singularRules as $rule => $replacement) {
            if (preg_match($rule, $word)) {
                $this->cacheSingular[$word] = preg_replace($rule, $replacement, $word);

                return $this->cacheSingular[$word];
            }
        }

        $this->cacheSingular[$word] = $word;

        return $word;
    }
}
