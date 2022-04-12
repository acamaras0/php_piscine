<?php
function ft_is_sort($array)
{
    $srt = $array;
    sort($srt);
    if (array_diff_assoc($srt, $array) == null)
        return true;
    return false;
}
?>