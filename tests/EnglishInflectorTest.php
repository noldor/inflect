<?php
declare(strict_types = 1);

namespace Noldors\Inflect\Tests;

use Noldors\Inflect\Inflector;
use Noldors\Inflect\Inflectors\EnglishInflector;

class EnglishInflectorTest extends BaseTestInflector
{
    /**
     * @var Inflector
     */
    protected static $inflector;

    public static function setUpBeforeClass()
    {
        \Locale::setDefault('en_US');
        static::$inflector = new Inflector(new EnglishInflector());
    }

    /**
     * Singular & Plural test data. Returns an array of sample words.
     *
     * @return array
     */
    public function dataSampleWords()
    {
        return [
            ['', ''],
            ['Alias', 'Aliases'],
            ['Alias', 'Aliases'],
            ['alumnus', 'alumni'],
            ['analysis', 'analyses'],
            ['aquarium', 'aquaria'],
            ['arch', 'arches'],
            ['atlas', 'atlases'],
            ['axe', 'axes'],
            ['baby', 'babies'],
            ['bacillus', 'bacilli'],
            ['bacterium', 'bacteria'],
            ['bureau', 'bureaus'],
            ['bus', 'buses'],
            ['Bus', 'Buses'],
            ['cactus', 'cacti'],
            ['cafe', 'cafes'],
            ['calf', 'calves'],
            ['categoria', 'categorias'],
            ['chateau', 'chateaux'],
            ['cherry', 'cherries'],
            ['child', 'children'],
            ['church', 'churches'],
            ['circus', 'circuses'],
            ['city', 'cities'],
            ['cod', 'cod'],
            ['cookie', 'cookies'],
            ['copy', 'copies'],
            ['crisis', 'crises'],
            ['criterion', 'criteria'],
            ['curriculum', 'curricula'],
            ['curve', 'curves'],
            ['deer', 'deer'],
            ['demo', 'demos'],
            ['dictionary', 'dictionaries'],
            ['domino', 'dominoes'],
            ['dwarf', 'dwarves'],
            ['echo', 'echoes'],
            ['elf', 'elves'],
            ['emphasis', 'emphases'],
            ['family', 'families'],
            ['fax', 'faxes'],
            ['fish', 'fish'],
            ['flush', 'flushes'],
            ['fly', 'flies'],
            ['focus', 'foci'],
            ['foe', 'foes'],
            ['food_menu', 'food_menus'],
            ['FoodMenu', 'FoodMenus'],
            ['foot', 'feet'],
            ['fungus', 'fungi'],
            ['glove', 'gloves'],
            ['half', 'halves'],
            ['hero', 'heroes'],
            ['hippopotamus', 'hippopotami'],
            ['hoax', 'hoaxes'],
            ['house', 'houses'],
            ['human', 'humans'],
            ['identity', 'identities'],
            ['index', 'indices'],
            ['iris', 'irises'],
            ['kiss', 'kisses'],
            ['knife', 'knives'],
            ['leaf', 'leaves'],
            ['life', 'lives'],
            ['loaf', 'loaves'],
            ['man', 'men'],
            ['matrix', 'matrices'],
            ['matrix_row', 'matrix_rows'],
            ['medium', 'media'],
            ['memorandum', 'memoranda'],
            ['menu', 'menus'],
            ['Menu', 'Menus'],
            ['mess', 'messes'],
            ['moose', 'moose'],
            ['motto', 'mottoes'],
            ['mouse', 'mice'],
            ['neurosis', 'neuroses'],
            ['news', 'news'],
            ['NodeMedia', 'NodeMedia'],
            ['nucleus', 'nuclei'],
            ['oasis', 'oases'],
            ['octopus', 'octopuses'],
            ['pass', 'passes'],
            ['person', 'people'],
            ['plateau', 'plateaux'],
            ['potato', 'potatoes'],
            ['powerhouse', 'powerhouses'],
            ['quiz', 'quizzes'],
            ['radius', 'radii'],
            ['reflex', 'reflexes'],
            ['roof', 'roofs'],
            ['runner-up', 'runners-up'],
            ['scarf', 'scarves'],
            ['scratch', 'scratches'],
            ['series', 'series'],
            ['sheep', 'sheep'],
            ['shelf', 'shelves'],
            ['shoe', 'shoes'],
            ['son-in-law', 'sons-in-law'],
            ['species', 'species'],
            ['splash', 'splashes'],
            ['spy', 'spies'],
            ['stimulus', 'stimuli'],
            ['stitch', 'stitches'],
            ['story', 'stories'],
            ['syllabus', 'syllabi'],
            ['tax', 'taxes'],
            ['terminus', 'termini'],
            ['thesis', 'theses'],
            ['thief', 'thieves'],
            ['tomato', 'tomatoes'],
            ['tooth', 'teeth'],
            ['tornado', 'tornadoes'],
            ['try', 'tries'],
            ['vertex', 'vertices'],
            ['virus', 'viri'],
            ['volcano', 'volcanoes'],
            ['wash', 'washes'],
            ['watch', 'watches'],
            ['wave', 'waves'],
            ['wharf', 'wharves'],
            ['wife', 'wives'],
            ['woman', 'women'],
        ];
    }

    /**
     * Normal & Transliterated data.
     *
     * @return array
     */
    public function dataSampleTranslit()
    {
        return [
            [
                'World faces largest µ humanitarian crisis ',
                'world-faces-largest-humanitarian-crisis'
            ],
            [
                'Intruder arrested on White House grounds',
                'intruder-arrested-on-white-house-grounds'
            ],
            [
                'Judge declines ® to halt US travel ban',
                'judge-declines-to-halt-us-travel-ban'
            ],
            [
                'Damascus bombing kills 40 π Iraqis',
                'damascus-bombing-kills-40-iraqis'
            ],
        ];
    }
}
