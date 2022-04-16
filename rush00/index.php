<?php
    session_start();
    include("install.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> BuyToy </title>
    <link href="css/about.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
            <ul>
                <li ><a href="index.php?page=about">Out & about</a></li>
                <li ><a href="index.php?page=items&category=0">Products</a>
                    <ul class="dropdown"> 
                        <li><a href="index.php?page=items&category=1">Fluffy</a></li>
                        <li><a href="index.php?page=items&category=2">Solid</a></li>
                    </ul>
                </li>
                    <?php
                        if ($_SESSION['loggued_on_user'] == "")
                        {
                            echo "<li> <a href=\"index.php?page=login\">login</a></li>";
                        }
                        else
                        {
                            echo "<li> <a href=\"index.php?page=profile\">Profile</a></li>";
                            echo "<li> <a href=\"index.php?page=logout\">logOut</a></li>";
                        }
                    ?>
                <li><a href="index.php?page=cart">Cart</a></li>
            </ul>
    </nav>
        <div class="contents-under">
            <?php include $homepage; ?>
        </div>
</body>
</html>