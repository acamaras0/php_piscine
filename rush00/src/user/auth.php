<?php
	function auth($login, $passwd)
	{
		if (!$login || !$passwd)
			return (FALSE);
		$data = unserialize(file_get_contents("db/user_info.csv"));
		foreach ($data as $user)
		{
			if ($user['login'] === $login && $user['passwd'] === hash("whirlpool", $passwd))
			{
				return true;
			}
		}
		echo "Authentication failed. \n";
		return false;
	}
?>