<?php

require './Model/DBconnection.php';
session_start();




if (!empty($_POST['email']) && !empty($_POST['pw'])) {



    $query = "select * from userlogin where email='$_POST[email]' AND pw='$_POST[pw]' " or die(mysql_error());
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);

    if (!empty($row['email']) && !empty($row['pw'])) {

        //session settings
        $_SESSION['userid'] = $row['u_id'];

        //setcookies or not
        if (isset($_POST['remember'])) {
            echo 'set wenna if';
            setcookie('usermail', $_POST['email'], time() + 60 * 60 * 24, '/account', 'www.Google.com');
            setcookie('userpw', $_POST['pw'], time() + 60 * 60 * 24, '/account', 'www.Google.com');
        } else {
            setcookie('usermail', $_POST['email'], false, '/account', 'www.Google.com');
            setcookie('userpw', $_POST['pw'], false, '/account', 'www.Google.com');
        }


        header("Location:Home.php");
    } else {

        header("Location:UserLogin.php?msg=Invalied email or password");
    }
} else {
    header("Location:UserLogin.php?msg= Warning : out of fields");
}
mysql_close();
