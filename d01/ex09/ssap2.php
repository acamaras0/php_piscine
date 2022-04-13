#!/usr/bin/php 
<?php
function comparison($x, $y)
{
    $i = 0;
    $to_compare = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
    while (($i < strlen($x))||($i < strlen($y)))
    {
        $index_x = stripos($to_compare, $x[$i]);
        $index_y = stripos($to_compare, $y[$i]);
        if ($index_x > $index_y)
            return (1);
        else if ($index_x < $index_y)
            return (-1);
        else
            $i++;
    }
}
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
usort($arr, "comparison");
foreach ($arr as $elem)
    echo "$elem\n";
?>