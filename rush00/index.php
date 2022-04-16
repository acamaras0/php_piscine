
<?php
	session_start();
	$product = unserialize(file_get_contents("items.csv"));
	foreach ($product as $key)
	{
		if ($key["type"] === "car")
			$car[] = "<div class=\"product1\"><p class=\"name\">".$key["name"]."\n</p><img src=\"".$key["image"]."\">\n<form method=\"POST\"><input type=\"submit\" name='button' value='".$key["name"]."'class=\"price\">".$key["price"]."€</></form>\n</div>\n";
		else if ($key["type"] === "doll")
			$doll[] = "<div class=\"product1\"><p class=\"name\">".$key["name"]."\n</p><img src=\"".$key["image"]."\">\n<form method=\"POST\"><input type=\"submit\" name='button' value='".$key["name"]."'class=\"price\">".$key["price"]."€</></form>\n</div>\n";
		else if ($key["type"] === "lego")
			$lego[] = "<div class=\"product1\"><p class=\"name\">".$key["name"]."\n</p><img src=\"".$key["image"]."\">\n<form method=\"POST\"><input type=\"submit\" name='button' value='".$key["name"]."'class=\"price\">".$key["price"]."€</></form>\n</div>\n";
	
	}

	function isadmin($current)
	{
		if (file_exists("user.csv"))
			$data = unserialize(file_get_contents("user.csv"));
		foreach ($data as $user)
		{
			if ($user['admin'] === "admin" && $user['login'] == $current)
				return (TRUE);
		}
		return (FALSE);
	}

	if ($_POST['button'])
	{
		if (file_exists("cart.csv"))
			$cart = unserialize(file_get_contents("cart.csv"));
		$p = unserialize(file_get_contents("items.csv"));
		foreach ($p as $pr)
		{
			if ($pr['name'] === $_POST['button'])
			{
				$cart[] = $pr;
				file_put_contents("basket.csv", serialize($caart));
			}
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Negative emotions</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<nav>
			<div class="header">
				<div class="header-left">Negative emotions</div>
				<div class="header-right">
					<div class="option"><a href="basket_page.php">Cart</a></div>
					<div class="option"><a href="login_page.php">Log in</a></div>
				</div>
			</div>
			<?php
			if ($_POST['new'] === "OK" && $_POST['name'] && $_POST['price'] && ($_POST['car'] || $_POST['doll'] || $_POST['lego']))
			{
			if (file_exists("items.csv"));
				$data = unserialize(file_get_contents("items.csv"));
			$add = array("name" => $_POST['name'], "price" => $_POST['price'], "type" => "", "quantity" => 0);
			if ($_POST['car'] == "car")
			{
				$add['type'] = $_POST['car'];
				$add['image'] = "car.jpg";
			}
			if ($_POST['doll'] == "doll")
			{
				$add['type'] = $_POST['doll'];
				$add['image'] = "doll.jpg";
			}
			if ($_POST['lego'] == "lego")
			{
				$add['type'] = $_POST['lego'];
				$add['image'] = "lego.jpg";
			}
			$data[] = $add;
			file_put_contents("items.csv", serialize($data));
			echo "<span style='color:green;text-align:center;'>Product added! Press 'OK' to see results.</span>";
		}
		else if ($_POST['new'] == "OK" && (!$_POST['car'] && !$_POST['doll'] && !$_POST['lego']))
			echo '<span style="color:#FF0000;text-align:center;">choose category</span>';
		else if (($_POST['new'] == "OK") && (!$_POST['name'] || !$_POST['price']))
			echo "fill in all the fields";
	?>


		</nav>
		<div class="product-display">
			<div class="category">
				<p class="cath">Depression
					<img class="image"src="https://i.redd.it/49b448ob5ta51.jpg">
				</p>
				<?php
					foreach ($car as $key)
						echo $key;
				?>
			</div>
			<div class="category">
				<p class="cath">Stress
					<img class="image"src="https://img.wattpad.com/d4182f1f8646c8a2eb621cd951b44a6364702fd5/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f31704c4e66454a5f6770717a71513d3d2d3735313336343438322e313561633865323165656366313266333438363437313939383231332e6a7067">
				</p>
				<?php
					foreach ($doll as $key)
					echo $key;
					?>
			</div>
			<div class="category">
				<p class="cath">Anxiety
				<img class="image"src="https://i.kym-cdn.com/photos/images/facebook/001/434/447/ce8.png">
				</p>
				<?php
					foreach ($lego as $key)
						echo $key;
				?>
			</div>
		</div>

		<hr>
		<footer>
			<div>
				© acamaras & msilen | Hive 2022
			</div>
		</footer>
	</body>
</html>