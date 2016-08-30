<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//require './Model/DBconnection.php';

$name_with = $_POST['name_with'];
$fullname = $_POST['fullname'];
$no = $_POST['no'];
$street = $_POST['street'];
$city = $_POST['city'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$nic = $_POST['nic'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$telno = $_POST['telno'];
$al_year = $_POST['al_year'];
$al_stream = $_POST['al_stream'];
$index = $_POST['index'];
$z = $_POST['z'];
$comtest = $_POST['comtest'];
$olindex = $_POST['olindex'];
$maths = $_POST['maths'];
$english = $_POST['english'];
$acedamic = $_POST['acedamic'];
$pref1 = $_POST['pref1'];
$pref2 = $_POST['pref2'];
$pref3 = $_POST['pref3'];

$username = "root";
$password = "";
$db = "sliatedb";
$host = "localhost";
$conn = mysql_connect($host, $username, $password);
mysql_select_db("sliatedb", $conn);



$savequery = "insert into application values('','$name_with','$fullname','$no','$street','$city',"
        . "'$dob','$age','$nic','$gender','$telno','$email','$al_year','$al_stream','$index','$comtest','$z','$olindex','$english','$maths','$acedamic','1')";

if (!mysql_query($savequery, $conn)) {
    die(mysql_error());
}

$max = "select MAX(appid) from application";
if (!mysql_query($max, $conn)) {
    die(mysql_error());
}
$maxresult = mysql_query($max);
//echo mysql_num_rows($maxresult);

$rows = mysql_fetch_array($maxresult);
//echo $rows[0];

$savepref = "insert into preference values('','$pref1','0','$pref2','0','$pref3','0','$rows[0]')";
if (!mysql_query($savepref, $conn)) {
    die(mysql_error());
}

header("Location: Register.php");
mysql_close();

//echo $name_with = $_POST['name_with'];
//echo $fullname = $_POST['fullname'];
//echo $no = $_POST['no'];
//echo $street = $_POST['street'];
//echo $city = $_POST['city'];
//echo $dob = $_POST['dob'];
//echo $age = $_POST['age'];
//echo $nic = $_POST['nic'];
//echo $gender = $_POST['gender'];
//echo $email = $_POST['email'];
//echo $telno = $_POST['telno'];
//echo $al_year = $_POST['al_year'];
//echo $al_stream = $_POST['al_stream'];
//echo $index = $_POST['index'];
//echo $z = $_POST['z'];
//echo $comtest = $_POST['comtest'];
//echo $olindex = $_POST['olindex'];
//echo $maths = $_POST['maths'];
//echo $english = $_POST['english'];
//echo $acedamic = $_POST['acedamic'];
//echo $pref1 = $_POST['pref1'];
//echo $pref2 = $_POST['pref2'];
//echo $pref3 = $_POST['pref3'];