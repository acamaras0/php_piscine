<?php
    session_start();
    $current = $_POST["login"];
    if($_POST["login"] == $current && $_POST["passwd"])
    {
        unset($user);
        unset($_SESSION['current_user']);
        echo "SUCCESS!";
    }
    else
    {
        $_SESSION["loggued_on_user"] = "";
        echo "ERROR: Wrong login or password.\n";
    }
?>