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
