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
$name = decrypt($_POST[encrypt("name")]);
$oldname = decrypt($_POST[encrypt("namea")]);

if($login == "" || $name == "" || $oldname == "")
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

$oldnameget = R::findOne('nicknames', 'accountname = ?', array($oldname));
if(isset($oldnameget))
{
    R::trash($oldnameget);
}

$nickname = R::dispense('nicknames');
$nickname->accountname = $name;
$nickname->gmail = $login;

R::store($nickname);

$user = R::findOne('users', 'gmail = ?', array($login));

$gold = json_get_value($user, 'Gold');
if($gold < 100)
{
   echo encrypt("nomoney");
   exit;
}
$user->json = json_encode(json_merge($user->json, '{"AccountName":"'.$name.'","Gold":'.($gold - 100).'}'));
R::store($user);

echo encrypt($name);

?>