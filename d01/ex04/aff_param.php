#!/usr/bin/php
<?php
$args = 1;
foreach ($argv as $elem)
{
	if($args++ > 1)
	{
		echo "$elem\n";
	}
}
?>