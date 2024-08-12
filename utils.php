<?php

function json_merge($json1, $json2)
{
    $arr1 = json_decode($json1, true);
    $arr2 = json_decode($json2, true);
    return array_merge($arr1, $arr2);
}

function json_get_value($user, $key)
{
    $json = $user->json;
    $array = json_decode($json, true);
    
    return $array[$key];
}

?>