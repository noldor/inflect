<?php
require 'vendor/autoload.php';

foreach (\Transliterator::listIDs() as $id) {

    var_dump($id);
    var_dump(preg_replace(
        ['/[^[a-zA-Z0-9-_ ]/u', '/\s/u', "/-{2,}/u"],
        ['', '-', '-'],
            \Transliterator::createFromRules(":: Any-Lower; :: $id; :: Any-Publishing; :: Any-NFKC; :: NFC;")
        ->transliterate(trim('El Papa admite su \'vergüenza por la sangre inocente que se vierte cada día\''))));
}