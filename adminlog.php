<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$uemail = $_POST['email'];
$up = $_POST['pw'];



if ($uemail == "admin@gmail.com" && $up == "123") {
    header("Location:NewUser.php");
} else {
    header("Location:AdminLogin.php?msg=Invalied Email or Password !");
}