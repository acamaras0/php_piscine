<div class= "login">
    <h1>Create account</h1>
    <form action="" method="POST">
        Login: <input type="text" name="login" value="" />
        <br />
        Password: <input type="text" name="passwd" value="" />
        <br />
        Confirm password: <input type="text" name="conf_passwd" value="" />
        <input type="submit" name="submit" value="OK" />
    </form>
</div>

<?php
    if($_POST["login"] && $_POST["passwd"] && $_POST["conf_passwd"] &&
       $_POST["submit"] && $_POST["submit"] == "OK")
    {
        if(file_exists("../private") == false)
            mkdir("../private");
        if(file_exists("../private/passwd") == false)
            file_put_contents("../private/passwd", NULL);
        $account = unserialize(file_get_contents('../private/passwd'));
        if($account)
        {
            $exists = 0;
            foreach($account as $key => $value)
            {
                if ($value["login"] === $_POST["login"])
                {
                    echo "Account already exists.\n";
                    $exists = 1;
                }
            }
        }
        if (!$exists)
        {
            $temp["login"] = $_POST["login"];
            $temp["passwd"] = hash('whirlpool', $_POST["passwd"]);
            $account[] = $temp;
            file_put_contents('../private/passwd', serialize($account));
            echo "Account created!\n";
        }
        else
            echo "ERROR: Try again!\n";
    }
    else
        echo "ERROR\n";
?>
