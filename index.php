<?php
require 'vendor/autoload.php';
$content = file_get_contents('word_rus.txt');


$content = preg_replace('/(.*)(?:\n|$)/u', "['\\1', '\\1', 0],\n['\\1', '\\1', 1],\n['\\1', '\\1', 2],\n['\\1', '\\1', 30],\n\n", $content);

echo nl2br($content);