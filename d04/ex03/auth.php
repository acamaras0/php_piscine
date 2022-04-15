<?php
    function auth($login, $passwd)
    {
        if(!$login || !$passwd)
            return false;
        $account = unserialize(file_get_contents('../private/passwd'));
        foreach($account as $key => $user)
        {
            if($user["login"] == $login && $user["passwd"] == hash('whirlpool', $passwd))
                return true;
        }
        return false;
    }
?>