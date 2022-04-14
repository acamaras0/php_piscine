#!/usr/bin/php
<?php 
date_default_timezone_set('Europe/Helsinki');
$f = fopen("/var/run/utmpx", "r");
while ($fd = fread($f, 628))
    {
        if (strlen($fd) == 628)
        {
            $fd = unpack("a256user/a4id/a32tty/ipid/itype/itime", $fd);
            if ($fd['type'] == 7)
            {
                $usr = trim($fd['user']);
                $t = trim($fd['tty']);
                $month = date("M", $fd['time']);
                $day = date("j", $fd['time']);
                $time = date("H:i", $fd['time']);
                printf("%-8s %-8s %s %2s %s\n", $usr, $t, $month, $day, $time);
            }
        }
    }
    fclose($f);
?>