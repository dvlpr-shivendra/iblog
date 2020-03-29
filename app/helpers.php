<?php

function readTime($text) {
    $word = str_word_count(strip_tags($text));
    $m = ceil($word / 200);
    return $m . ' min' . ($m == 1 ? '' : 's') . ' read';

}
