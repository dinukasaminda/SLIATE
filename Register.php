<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require './Model/DBconnection.php';
require './SessionHandler.php';

$query = "SELECT * FROM course order by cid asc";
$result = mysql_query($query) or dir(mysql_error());
$result1 = mysql_query($query) or dir(mysql_error());
$result2 = mysql_query($query) or dir(mysql_error());

if (mysql_num_rows($result) == null) {
    echo 'no result';
}

mysql_close();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/registerjs.js"></script>
        <title>SLIATE SRP - Registration</title>

        <style type="text/css">
            #base{
                margin:  70px;

            };
        </style>

    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">SLIATE Student Registration Portal</a>
                </div>
                <div>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Home.php"><span class="glyphicon glyphicon-user"> </span> <?php print($user); ?></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-flag"> </span> <?php print($department . " " . "Department "); ?></a></li>
                        <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Sign out</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="base">
            <div class="page-header">
                <h1>Application Register Portal</h1>
            </div>
            <form action="SaveApps.php" method="post" onsubmit="return(validate());">

                <div  class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon"><label for="Namewithinit">Name with Initials </label>
                                <span class="glyphicon glyphicon-user"></span></span>
                            <input type="text"  class="form-control" placeholder="Name with Initials" name="name_with" required="required">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <span class="input-group-addon"><label for="fullname">Full Name </label>
                                <span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" placeholder="Full Name" name="fullname" required="required">
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon"><label for="no">No </label>
                                <span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="text"  class="form-control" placeholder="" name="no" required="required">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon"><label for="street">Street </label>
                                <span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="text"  class="form-control" placeholder="" name="street" required="required">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon"><label for="city">City </label>
                                <span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="text"  class="form-control" placeholder="" name="city" required="required">
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <span class="input-group-addon"><label for="dob">Date of Birth </label>
                                <span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="date"  class="form-control" placeholder="" name="dob" required="required">
                        </div>
                    </div>

                    <div class="col-sm-3">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="age">Age</label>
                                <span class="glyphicon glyphicon-calendar"></span></span>
                            <input type="number" min="18" max="30" class="form-control"  name="age" required="required">
                        </div>                   
                    </div>

                    <div class="col-sm-3">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="nic">NIC</label>
                                <span class="glyphicon glyphicon-signal"></span></span>
                            <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text"  class="form-control" id="nic"  name="nic" required="required">
                            <span class="input-group-addon">V</span>
                        </div>                   
                    </div>

                    <div class="col-sm-2">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="gender">Sex</label>
                                <span class="glyphicon glyphicon-flag"></span></span>
                            <select class="form-control" id="gender" name="gender">
                                <option value="TYPE">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>

                        </div>                   
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="email">E mail</label>
                                <span class="glyphicon glyphicon-send"></span></span>
                            <input type="email"  class="form-control"  name="email" required="required">
                        </div>                   
                    </div>
                    <div class="col-sm-4">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="telno">Telephone No</label>
                                <span class="glyphicon glyphicon-send"></span></span>
                            <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text"  class="form-control" id="telno"  name="telno" required="required">
                        </div>                   
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-2">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="al_year">A/L Year</label>
                                <span class="glyphicon glyphicon-calendar"></span> <b>20</b></span>
                            <input class="form-control" type="number" min="10" name="al_year" required="required" >
                        </div>                   
                    </div>

                    <div class="col-sm-3">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="al_stream">A/L Stream</label>
                                <span class="glyphicon glyphicon-blackboard "></span> </span>
                            <select id="al_stream" name="al_stream" class="form-control">
                                <option selected="selected" value="TYPE">Select A/L Stream </option>
                                <option value="Science">Science </option>
                                <option value="Maths">Maths </option>
                                <option value="Arts">Arts </option>
                                <option value="Commerce">Commerce </option>
                                <option value="Other">Other</option>
                            </select>
                        </div>                   
                    </div>

                    <div class="col-sm-3">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="al_index">A/L Index No</label>
                                <span class="glyphicon glyphicon-barcode "></span> </span>
                            <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text"  class="form-control"   name="index" required="required">
                        </div>                   
                    </div>

                    <div class="col-sm-2">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="z">Z score</label>
                                <span class="glyphicon glyphicon-scale"></span> </span>
                            <input type="text"  class="form-control" id="zscore" placeholder="ex:1.95" onblur="validateZ(this);"  name="z" required="required">
                        </div>                   
                    </div>

                    <div class="col-sm-2">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="comtest">Gen.Test</label>
                            </span>
                            <select  class="form-control" id="comtest"  name="comtest">
                                <option value="TYPE">Select</option>
                                <option value="Pass">Pass</option>
                                <option value="Fail">Fail</option>
                            </select>
                        </div>                   
                    </div>

                </div><br>

                <div class="row" >
                    <div class="col-sm-3">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="ol_index">O/L Index No</label>
                                <span class="glyphicon glyphicon-barcode "></span> </span>
                            <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text"  class="form-control"  name="olindex" required="required">
                        </div>                   
                    </div>

                    <div class="col-sm-3">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="maths">Maths Result</label>
                                <span class="glyphicon glyphicon-scale "></span> </span>
                            <select  class="form-control" id="maths"  name="maths">
                                <option selected value="TYPE">Select</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="S">S</option>
                                <option value="F">F</option>
                            </select>
                        </div>                   
                    </div>

                    <div class="col-sm-3">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="english">English Result</label>
                                <span class="glyphicon glyphicon-scale "></span> </span>
                            <select  class="form-control" id="english"  name="english">
                                <option selected value="TYPE">Select</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="S">S</option>
                                <option value="F">F</option>
                            </select>
                        </div>                   
                    </div>
                    <div class="col-sm-3">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="academic">Academic year </label>
                                <span class="glyphicon glyphicon-calendar"></span> <b>20</b></span>
                            <input class="form-control" type="number" min="15" name="acedamic" required="required">
                        </div>                   
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="pref1">Preference 1 </label>
                                <span class="glyphicon glyphicon-calendar"></span></span>
                            <select id="pref1" name="pref1" class="form-control">
                                <option value="0">Select Course</option>
                                <?php
                                while ($row = mysql_fetch_assoc($result)) {
                                    echo $row['cid'] . " " . $row['course'];
                                    ?>
                                    <option value="<?php print($row['cid']); ?>"><?php print($row['course']); ?></option>
                                <?php } ?>
                            </select>
                        </div>                   
                    </div>

                    <div class="col-sm-4">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="pref2">Preference 2 </label>
                                <span class="glyphicon glyphicon-calendar"></span></span>
                            <select id="pref2" name="pref2" class="form-control">
                                <option value="0">Select Course</option>
                                <?php
                                while ($row = mysql_fetch_assoc($result1)) {
                                    echo $row['cid'] . " " . $row['course'];
                                    ?>
                                    <option value="<?php print($row['cid']); ?>"><?php print($row['course']); ?></option>
                                <?php } ?>
                            </select>
                        </div>                   
                    </div>

                    <div class="col-sm-4">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="pref3">Preference 3 </label>
                                <span class="glyphicon glyphicon-calendar"></span></span>
                            <select id="pref3" name="pref3" class="form-control">
                                <option value="0">Select Course</option>
                                <?php
                                while ($row = mysql_fetch_assoc($result2)) {
                                    echo $row['cid'] . " " . $row['course'];
                                    ?>
                                    <option value="<?php print($row['cid']); ?>"><?php print($row['course']); ?></option>
                                <?php } ?>
                            </select>
                        </div>                   
                    </div>

                </div>
                <hr class="dl-horizontal">
                <input type="submit" class="btn btn-info" value="Save Application">

                </div>
            </form>
            <div class="panel-footer">
                Powered by CODE Force Consolidated - 2015
            </div>
        </div>

    </body>
</html>
