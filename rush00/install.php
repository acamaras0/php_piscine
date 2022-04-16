#!/usr/bin/php
<?php
	file_put_contents("db/user_info.csv", "a:1:{i:0;a:3:{s:5:\"login\";s:5:\"admin\";s:6:\"passwd\";s:128:\"6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94\";s:5:\"admin\";s:5:\"admin\";}}\"");
	file_put_contents("db/items.csv", "a:1:{i:0;a:5:{s:4:\"name\";s:13:\"Barbie doll\";s:5:\"price\";s:3:\"923\";s:8:\"category\";s:3:\"dolls\";s:8:\"quantity\";i:0;s:5:\"image\";s:7:\"barbie.jpg\";}}");
	file_put_contents("db/basket.csv", "");
?>