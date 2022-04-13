#!/usr/bin/php 
<?php
if ($argc != 4)
    echo "Incorrect Parameters\n";
else
{
    $x = trim($argv[1]);
    $sign = trim($argv[2]);
    $y = trim($argv[3]);
    switch($sign)
    {
        case "+":
            echo $x + $y . "\n";
            break;
        case "-":
            echo $x - $y . "\n";
            break;
        case "*":
            echo $x * $y . "\n";
            break;
        case "/":
            echo $x / $y . "\n";
            break;
        case "%":
            echo $x % $y . "\n";
            break;
        default:
            echo "Incorrect Parameters";
    }
}
?>