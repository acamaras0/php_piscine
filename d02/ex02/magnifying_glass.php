#!/usr/bin/php
<?php

	function ft_replace_pattern1($matches)
	{	
		return ('title='.strtoupper($matches[1]));
	}
	function ft_replace_pattern2($matches)
	{
		return (">".strtoupper($matches[1])."<");
	}
	function ft_replace($matches)
	{
		$str = preg_replace_callback('/title=(\s*["\'][^"\']*)/', 'ft_replace_pattern1', $matches[1]);
		if (preg_match("/<.*/", $matches[2]))
		{
			$tmp = preg_replace_callback('/title=(\s*["\'][^"\']*)/', 'ft_replace_pattern1', $matches[2]);
			$tmp = preg_replace_callback("/>([^<]*)</", 'ft_replace_pattern2', $tmp);
			$str = $str.$tmp.$matches[3];
		}
		else
			$str = $str.strtoupper($matches[2]).$matches[3];
		return ($str);
	}
	if ($argc == 1)
		return ;
	$str = file_get_contents($argv[1]);
	echo preg_replace_callback('/(<a [^>]*)(>.*?)(<\/a>)/sim', 'ft_replace', $str);
?>
