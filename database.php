<?php

require ("rb-mysql.php");
require ("db-data.php");

R::setup($host, $login, $password);

if(!R::testConnection())
{
    http_response_code(500);
    exit;
}

 R::freeze( true );

?>