<div class= "login">
    <h1>Change your password</h1>
    <form action="" method="POST">
        Login: <input type="text" name="login" value="" />
        <br />
        Old password: <input type="old_password" name="Old password" value="" />
        <br />
        New password: <input type="new_password" name="New Password" value="" />
        <input type="submit" name="submit" value="OK" />
    </form>
    <br/>
    <div><a href="index.php?page=create">modify account</div>
</div>

<?php
    if($_POST["login"] && $_POST["newpw"] && $_POST["oldpw"] &&
    $_POST["submit"] && $_POST["submit"] == "OK" && file_exists("../private/passwd"))
    {
     $account = unserialize(file_get_contents('../private/passwd'));
     $exists = 0;
    foreach($account as $key => $value)
    {
        if ($value["login"] === $_POST["login"] && $value["passwd"] === hash('whirlpool', $_POST["oldpw"]))
        {
            $exists = 1;
            $account[$key]["passwd"] = hash('whirlpool', $_POST["newpw"]);
        }
    }
    if ($exists)
    {
        file_put_contents('../private/passwd', serialize($account));
        echo "OK\n";
    }
    else
        echo "ERROR\n";
 }
 else
     echo "ERROR\n";
?>
