#!/usr/bin/php
<?php

$args = 1;
$arr = array();
foreach ($argv as $elem)
{
    if ($args++ > 1)
    {
        $tem = preg_split("/\s+/", trim($elem));
        if($tem[0] != "")
            $arr = array_merge($arr, $tem);

    }
}
sort($arr);
foreach ($arr as $elem)
    echo "$elem\n";
?>