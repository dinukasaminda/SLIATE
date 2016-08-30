<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require './Model/DBconnection.php';

$query = mysql_query("select * from application") or die(mysql_error());

while ($row = mysql_fetch_assoc($query)) {
    if ($row['gen_test'] != "Pass" || $row['z_score'] <= 0.00 || $row['o/l_english'] == "F" || $row['o/l_maths'] == "F") {

        mysql_query("update application SET status ='0' where appid='$row[appid]' ") or die(mysql_error());

        header("Location: AllApps.php");
    }
}