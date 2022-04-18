<?php
    if($_POST["login"] && $_POST["passwd"] &&
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
                        $exists = 1;
            }
        }
        if (!$exists)
        {
            $temp["login"] = $_POST["login"];
            $temp["passwd"] = hash('whirlpool', $_POST["passwd"]);
            $account[] = $temp;
            file_put_contents('../private/passwd', serialize($account));
            echo "OK\n";
        }
        else
            echo "ERROR\n";
    }
    else
        echo "ERROR\n";
?>
