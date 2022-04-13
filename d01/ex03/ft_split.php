<?php
	function ft_split($s)
	{
		$arr = preg_split("/\s+/", trim($s));
		sort($arr);
		if (!count($arr) || !$arr[0])
			return (NULL);
		return ($arr); 
	}
?>
