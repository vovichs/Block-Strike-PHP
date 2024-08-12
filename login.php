<?php
require ("database.php");
require ("utils.php");
require ("cipher.php");

$browser = $_SERVER['HTTP_USER_AGENT'];
if($browser != 'BestHTTP 1.11.2 1337')
{
    exit;
}

$login = decrypt($_POST[encrypt("login")]);

//http_response_code(423);

//http_response_code(502);
//exit;

if($login == "")
{
    echo encrypt("error");
    exit;
}

$user = R::findOne('users', 'gmail = ?', array($login));
if (!isset($user))
{
    echo encrypt("register");
}
else
{
    echo encrypt($user->json);
}

?>