#!/usr/bin/php
<?php
    $title = "/<a.*?title.*?\"(.*?)\"/ism";
    $link = "/<a .*?>(.*?)</ism";
    $str = implode("", file($argv[1]));
    preg_match_all($title, $str, $match0);
    preg_match_all($link, $str, $match1);
    $match0 = array_slice($match0, 1);
    $match1 = array_slice($match1, 1);
    foreach ($match1[0] as $string)
        $str = str_replace($string, strtoupper($string), $str);
    foreach ($match0[0] as $string)
        $str = str_replace($string, strtoupper($string), $str);
    echo $str;
?>