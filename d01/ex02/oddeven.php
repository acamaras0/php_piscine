#!/usr/bin/php
<?php
$s = fopen("php://stdin", "r");
while ($s && !feof($s))
{
	echo('Enter a number: ');
	$num = fgets($s);
	if ($num)
	{
		$num = str_replace("\n", "", $num);
		if(is_numeric($num))
		{
			if ($num % 2 == 0)
				echo "The number " . $num . " is even\n";
			else
				echo "The number " . $num . " is odd\n";
		}
		else
			echo "'" . $num . "' is not a number\n";
	}
}
echo "\n";
?>
