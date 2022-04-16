<div class= "login">
    <h1>Create account</h1>
    <form action="" method="POST">
        Login: <input type="text" name="login" value=""/>
        <br />
        Password: <input type="text" name="passwd"value=""/>
        <br>
        <input type="submit" name="submit" value="OK" />
    </form>
    <br/>
    <div><a href="index.php?page=create">create account</div>
</div>

<?php
    session_start();
    if($_GET["login"] && $_GET["passwd"] && auth($_GET["login"], $_GET["passwd"]))
    {
        $_SESSION["loggued_on_user"] = $_GET["login"];
        echo "OK\n";
    }
    else
    {
        $_SESSION["loggued_on_user"] = "";
        echo "ERROR\n";
    }
?>
