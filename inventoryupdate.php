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
$data = decrypt($_POST[encrypt("data")]);

if($login == "" || $data == "")
{
    echo encrypt("error");
    exit;
}

$user = R::findOne('users', 'gmail = ?', array($login));

$user->json = json_encode(json_merge($user->json, $data));
R::store($user);

echo encrypt($data);

?>