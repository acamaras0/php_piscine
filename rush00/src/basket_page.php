<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Products</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<nav>
			<ul class="menu">
			<li class="parent" id="left-align"><a href="#">Shopping cart</a></li>
			<li class="parent"><a href="index.php" class="login">To Shop!</a></li>
			<li class="parent"><a href="#basket">Cart</a></li>
			</ul>
		</nav>
		<br>
		<div class="login-menu">
	
	<?php
	session_start();
	$basket = unserialize(file_get_contents("basket.csv"));
	$total = 0;
	foreach ($basket as $k)
	{
		$basket2[] = $k['name']. "<br/>Price: ".$k['price']."€";
		$total += (float)$k['price'];
	}
	$basket2 = array_count_values($basket2);
	$hype[] = "<p>order:</p>";
	foreach ($basket2 as $key => $value)
	{
		echo "<p>Product: ".$key."<br> Quantity: ".$value."</p><br>";
		$hype[] = "<p>Product: ".$key."<br> Quantity: ".$value."</p><br>";
	}
	echo "<p>Total price: ".$total."€</p>";
	if ($_SESSION['current_user'])
		echo "<form method=\"POST\"><input type=\"submit\" name='button1' value='Validate'></form>";
	if ($_POST['button1'] === "Validate")
		{
			$order = file_get_contents("orders.csv");
			$p = unserialize(file_get_contents("basket.csv"));
			$orders[] = $hype;
			foreach ($orders as $k)
				file_put_contents("orders.csv", $k, FILE_APPEND);
			file_put_contents("orders.csv", "\n", FILE_APPEND);
			unlink("basket.csv");
			header('Location: basket_page.php');
		}
	?>
	</div>

	</body>
</html>