<head>
	<meta charset="utf-8">
	<title>Negative emotions</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
	<body>
	<table>
		<td></td>
		<td class="bartitle"><h1 class="title">Negative Emotions</h1></td>
		<td></td>
		<td class="login"><a href="index.php" class="login">To shop!</a></td>
		<td class="basket"><a href="basket_page.php"><img title="basket" alt="basket" class=img src="img/basket.png"> Cart</a></td>
	</table>
	<br>
	<div class="login_menu">

	<?php
	include "user/auth.php";
	session_start();
	function user_exists($arr, $username)
	{
		foreach ($arr as $user)
		{
			if ($user['login'] === $username)
			{
				echo "Username <span style=\"color: red;\">".$username." </span> already exists!\n";
				return true;
			}
		}
		return false;
	}

	if ($_POST['logout'] == "logout")
	{
		session_start();
		$username = $_SESSION['current_user'];
		$_SESSION['current_user'] = "";
		echo $username. " logged out!";
	}

	if ($_POST['submit'] === "create" && $_POST['login'] && $_POST['passwd'])
	{
		$arr = unserialize(file_get_contents("db/user_info.csv"));
		if (!user_exists($arr, $_POST['login']))
		{
			$new['login'] = $_POST['login'];
			$new['passwd'] = hash("whirlpool", $_POST['passwd']);
			if ($_POST['login'] === "admin")
				$new['admin'] = "admin";
			$arr[] = $new;
			file_put_contents("db/user_info.csv", serialize($arr));
			echo "User creation successful\n";
		}
	}
	else if ($_POST['submit'] === "create")
		echo "Fill in both fields\n";

	function isadmin($user)
	{
		if (file_exists("db/user_info.csv"))
			$data = unserialize(file_get_contents("db/user_info.csv"));
		foreach ($data as $user)
		{
			if ($user['admin'] === "admin")
				echo "ADMIN";

				return (TRUE);
		}
		return (FALSE);
	}
	if ($_POST['submit'] === "login")
	{
		if (auth($_POST['login'], $_POST['passwd']) && $_POST['login'] !== $_SESSION['current_user'])
		{
			$_SESSION['current_user'] = $_POST['login'];
			echo "<span style =\"color: green;\">".$_SESSION['current_user']."</span> logged in!";
			if (isadmin($_POST['login']))
				echo "ADMIN";
			else
				echo "NOT ADMIN";
		}
		else if ($_SESSION['current_user'] === $_POST['login'])
			echo "<span style =\"color: red;\">".$_SESSION['current_user']."</span> already logged in!";
		else
			echo "<span style =\"color: red;\">invalid username or password. </span>";
	}
?>

<?php
		if ($_SESSION['current_user'] && $_SESSION['current_user'] !== "")
		{
			echo "Logged in as <span style =\"color: green;\">".$_SESSION['current_user']."</span> ";
			echo "<form method=\"POST\"><input type=\"submit\" name=\"logout\" value=\"logout\"></form>";
		}
		else
			echo "<h1>Log in</h1>
			<form name=\"index.php\" method=\"POST\">
				Login: <input name=\"login\" value=\"\" />
				<br />
				Password: <input type=\"password\" name=\"passwd\" value=\"\" />
				<input type=\"submit\" name=\"submit\" value=\"login\" />
			</form>
			<br /><br />"
?>

		<h1>Create user</h1>
		<form name="" method="POST">
			Login: <input name="login" value="" />
			<br />
			Password: <input type="password" name="passwd" value="" />
			<input type="submit" name="submit" value="create" />
		</form>
		<br /><br /><br />

		<h1>Delete user</h1>
		<form name="" method="POST">
			Login: <input name="login" value="" />
			<br />
			Password: <input type="password" name="passwd" value="" />
			<input type="submit" name="submit" value="create" />
		</form>
		<br /><br /><br />

	
<?php
		if ($_SESSION['current_user'] && $_SESSION['current_user'] !== "")
			echo "<form method='POST' name='userdel'><input type='submit' name='userdel' value='delete user'></form>";
		if ($_POST['userdel'])
			echo"<form method='POST' name='delpasswd'>Password:<input type='password' name='passwd1' value=''><br />Repeat password: <input type='password' name='passwd2' value=''><input type='submit' name='deluser' value='submit'>";
		if ($_POST['deluser'])
		{
			if ($_POST['passwd1'] == $_POST['passwd2'])
			{
				if (auth($_SESSION['current_user'], $_POST['passwd1']))
				{
					$data = unserialize(file_get_contents("db/user_info.csv"));
					foreach ($data as $user){
						if ($user['login'] == $_SESSION['current_user'])
						{
							unset($user);
							unset($_SESSION['current_user']);
							echo "SUCCESS!";
						}
					}
					file_put_contents("db/user_info.csv", $data);
				}
				else
					echo "Invalid password";
			}
			else
				echo "The passwords don't match";
		}
?>
</body></html>
