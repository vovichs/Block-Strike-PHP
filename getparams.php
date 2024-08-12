<?php
require ("database.php");
require ("cipher.php");

$browser = $_SERVER['HTTP_USER_AGENT'];
if($browser != 'BestHTTP 1.11.2 1337')
{
    exit;
}

$array = R::find('params');
echo encrypt_with_key(json_encode($array['3'], JSON_UNESCAPED_SLASHES), '5C:3E:A1:82:88:A4:07:3F:32:53:FE:D9:BF:A1:F4:F9');

?>