<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require './Model/DBconnection.php';

$result = mysql_query("select * from usertype") or die(mysql_errno());
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
<script src="js/newuserjs.js"></script>
        <title>SLIATE SRP - Create Account</title>

        
<style type="text/css">
            #base{

                margin: 70px;

            };
        </style>

        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">SLIATE Student Registration Portal - Admin Panel</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Create New Account</a></li>                        
                        <li><a href="#">View Account</a></li>

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mr Raveen</a></li>
                        <li><a href="AdminLogin.php"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="base">
            <div class="page-header">
                <h1>Create new user account</h1>
            </div>
            <?php if (isset($_GET['msg'])) { ?>
                <div class="alert alert-danger">
                    <strong><?php print($_GET['msg']); ?></strong> 
                </div>
            <?php } ?>

            <form action="SaveUsers.php" method="post" onsubmit="return(validate());"  >

                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><label for="utype">User type &nbsp; </label>
                                <span class="glyphicon glyphicon-flag"></span></span>
                            <select class="form-control" id="utype" name="utype">
                                <option value="TYPE">Select User Type</option>
                                <?php
                                while ($row = mysql_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php print($row['utype_id']); ?>"><?php print($row['usertype']); ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><label for="accname">Account Name &nbsp;</label>
                                <span class="glyphicon glyphicon-user"></span></span>
                            <input type="text"  class="form-control" name="accname" required="required">
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><label for="dept">Department &nbsp; </label>
                                <span class="glyphicon glyphicon-bishop"></span></span>
                            <select class="form-control" id="dept" name="dept">
                                <option value="TYPE">Select Department</option>
                                <option value="IT">IT</option>
                                <option value="Accountancy">Accountancy </option>
                                <option value="Management">Management</option>
                                <option value="Business Finance">Business Finance</option>
                                <option value="THM">THM</option>
                                <option value="Business Administration">Business Administration</option>
                                <option value="English">English</option>
                                <option value="Administrative">Administrative</option>

                            </select>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-5">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="email">E mail &nbsp;</label>
                                <span class="glyphicon glyphicon-send"></span></span>
                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  class="form-control"  name="email" required="required">
                        </div>                   
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-5">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="pw">Password  &nbsp;</label>
                                <span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" pattern="(?=^.{8,20}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must contain 1 uppercase, lowercase,at least one digit or speacial character and must be 8 to 20 characters."  class="form-control" id="pw" name="pw" required="required">
                        </div>                   
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-5">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="conpw">Confirm password  &nbsp;</label>
                                <span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password"  class="form-control" id="conpw"  name="conpw" required="required">
                        </div>                   
                    </div>
                </div>

                <hr>
                <input type="submit" class="btn btn-primary" value="Create New Account">
            </form>
        </div>
        <div class="panel-footer">
            Powered by CODE Force Consolidated - 2015
        </div>
    </body>
</html>
