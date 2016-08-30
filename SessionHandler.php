<?php

require './Model/DBconnection.php';
session_start();

$uid = $_SESSION['userid'];


$result = mysql_query("select * from user where u_id='$uid'") or die(mysql_error());

$row = mysql_fetch_array($result);
$user = $row['username'];
$department=$row['department'];
$utype=$row['utype_id'];

if (!isset($user)) {
    mysql_close(); // Closing Connection
    header('Location: UserLogin.php'); // Redirecting To Home Page
}