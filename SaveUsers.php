<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//require './Model/DBconnection.php';
$user = $_POST['accname'];
$dept = $_POST['dept'];
$utid = $_POST['utype'];
$email = $_POST['email'];
$pw = $_POST['pw'];
$cpw = $_POST['conpw'];




$username = "root";
$password = "";
$db = "sliatedb";
$host = "localhost";
$conn = mysql_connect($host, $username, $password);
mysql_select_db("sliatedb", $conn);

$checkquery = mysql_query("select * from userlogin where email='$email'") or die(mysql_error());
$rowcount = mysql_num_rows($checkquery);
if ($rowcount > 0) {
    header("Location:NewUser.php?msg= Warning : Email is already exists");
} else {

    $save = "insert into user values('','$user','$dept','$utid')";

    if (!mysql_query($save, $conn)) {

        die(mysql_error());
    }


    $maxuid = "select MAX(u_id) from user";

    if (!mysql_query($maxuid, $conn)) {

        die(mysql_error());
    }

    $result = mysql_query($maxuid, $conn);

    $maxid = mysql_fetch_array($result);



    $save2 = "insert into userlogin values('','$email','$pw','$cpw','0','$maxid[0]')";

    if (!mysql_query($save2, $conn)) {

        die(mysql_error());
    }
}

header("Location:NewUser.php");
mysql_close();
