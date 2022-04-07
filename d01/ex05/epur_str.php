#!/usr/bin/php
<?php
if ($argc > 1)
{
	$s = trim($argv[1]);
	$s = preg_replace('/\s+/', ' ', $s);
	if($s)
		echo "$s\n";
}
?>