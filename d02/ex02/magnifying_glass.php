#!/usr/bin/php
<?php
    $pattern0 = "/(?<=)<a.*?<\/a>/ism";
    $pattern1 = "/(?<=>).*?<|(?<=title)=\"(.*?)\"/ism";
    if ($argc == 2)
    {
        $str = implode("", file($argv[1]));
        $ret = $str;
        preg_match_all($pattern0, $str, $match);
        $str = implode("", $match[0]);
        preg_match_all($pattern1, $str, $match);
        foreach($match[0] as $string)
            $ret = preg_replace("/$string/", strtoupper($string), $ret);
        echo $ret;
    }
?>
