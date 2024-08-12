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
$json = decrypt($_POST[encrypt("json")]);
$name = decrypt($_POST[encrypt("name")]);

if($login == "" || $json == "" || $name == "")
{
    echo encrypt("error");
    exit;
}

$getname = R::findOne('nicknames', 'accountname = ?', array($name));
if (isset($getname))
{
   echo encrypt("busy");
   exit;
}

$nickname = R::dispense('nicknames');
$nickname->accountname = $name;
$nickname->gmail = $login;

R::store($nickname);

$user = R::dispense('users');
$user->gmail = $login;
$user->json = $json;

R::store($user);

echo encrypt($json);

?>