<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require './Model/DBconnection.php';
require './SessionHandler.php';

$zscore = $_POST['z'];
$cid = $_POST['CID'];
echo $zscore;
echo $cid;

$all = mysql_query("select  * from "
        . "application,preference where application.appid= preference.app_id AND (preference.pref1='$cid' or preference.pref2='$cid' or preference.pref3='$cid' ) ") or die(mysql_error());


while ($arow = mysql_fetch_assoc($all)) {
    if ($arow['pref1'] == $cid) {
        if ($arow['z_score'] >= $zscore) {
            mysql_query("update application SET status = 2 where appid='$arow[appid]' ") or die(mysql_errno());
            mysql_query("update preference SET status1 = 1 where app_id='$arow[appid]' ") or die(mysql_errno());
        }
        else{
            mysql_query("update application SET status = 3 where appid='$arow[appid]' ") or die(mysql_errno());
        }
    } else if ($arow['pref2'] == $cid) {
        if ($arow['z_score'] >= $zscore) {
            mysql_query("update application SET status = 2 where appid='$arow[appid]' ") or die(mysql_errno());
            mysql_query("update preference SET status2 = 1 where app_id='$arow[appid]' ") or die(mysql_errno());
        }
        else{
            mysql_query("update application SET status = 3 where appid='$arow[appid]' ") or die(mysql_errno());
        }
    } else {
        if ($arow['z_score'] >= $zscore) {
            mysql_query("update application SET status = 2 where appid='$arow[appid]' ") or die(mysql_errno());
            mysql_query("update preference SET status3 = 1 where app_id='$arow[appid]' ") or die(mysql_errno());
        }
        else{
            mysql_query("update application SET status = 3 where appid='$arow[appid]' ") or die(mysql_errno());
        }
    }
}
//hellow
header("Location:DeptApps.php");
