<?php

$conn_error = "Couldnt to connect! Error Page";
$username = "root";
$password = "";
$db = "sliatedb";
$host = "localhost";

mysql_select_db($db);

if (!@mysql_connect($host, $username, $password) || !mysql_select_db($db)) {
    die($conn_error);
}


