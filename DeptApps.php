<!DOCTYPE html>
<?php
require './Model/DBconnection.php';
require './SessionHandler.php';

$courseid;
$count1 = 0;
$count2 = 0;
$count3 = 0;
$count4 = 0;
$count5 = 0;
$count = 0;

$uquery = mysql_query("select * from user where u_id='$row[u_id]' ") or die(mysql_error());

$result = mysql_fetch_array($uquery);

if ($result['department'] == "Business Administration") {
    $courseid = 4;
}
if ($result['department'] == "Accountancy") {
    $courseid = 5;
}
if ($result['department'] == "IT") {
    $courseid = 1;
}
if ($result['department'] == "Management") {
    $courseid = 2;
}
if ($result['department'] == "Business Finance") {
    $courseid = 7;
}
if ($result['department'] == "THM") {
    $courseid = 3;
}
if ($result['department'] == "English") {
    $courseid = 6;
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/registerjs.js"></script>
        <title>SLIATE SRP - Department Application</title>

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
                <h1>Department Application Portal</h1>
            </div>

            <br>

            <?php
            if ($courseid == 1 || $courseid == 6) {
                $ie = mysql_query("select * from "
                        . "application,preference where application.appid= preference.app_id AND (preference.pref1='$courseid' or preference.pref2='$courseid' or preference.pref3='$courseid') AND status=1 ") or die(mysql_error());
                ?>
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>NIC</th>
                                <th>Gender</th>
                                <th>Contact</th>
                                <th>A/l Stream</th>
                                <th>Z score</th>
                                <th>Gen.Test</th>
                                <th>English</th>
                                <th>Maths</th>
                                <th>Academic Year</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($arow = mysql_fetch_assoc($ie)) {
                                ?>

                                <tr class="warning">
                                    <td><?php print( ++$count); ?></td>
                                    <td><?php print( $arow['name_with_init']); ?></td>
                                    <td><?php print( $arow['age']); ?></td>
                                    <td><?php print( $arow['nic']); ?></td>
                                    <td><?php print( $arow['gender']); ?></td>
                                    <td><?php print( $arow['telno']); ?></td>
                                    <td><?php print( $arow['a/l_stream']); ?></td>
                                    <td><?php print( $arow['z_score']); ?></td>
                                    <td><?php print( $arow['gen_test']); ?></td>
                                    <td><?php print( $arow['o/l_english']); ?></td>
                                    <td><?php print( $arow['o/l_maths']); ?></td>
                                    <td>20<?php print( $arow['acedemic_year']); ?></td>

                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>

                <div class="row">
                    <form action="AppSelecter.php" method="post" >
                        <div class="col-sm-4">  

                            <div class="input-group">
                                <span class="input-group-addon"><label for="z">Z score</label>
                                    <span class="glyphicon glyphicon-scale"></span> </span>
                                <input type="text"  class="form-control" id="zscore" placeholder="ex:1.95" onblur="validateZ(this);"  name="z" required="required">

                            </div>  
                        </div>
                        <input type="hidden" name="CID" value="<?php print($courseid); ?>">
                        <div class="col-sm-2">  <input type="submit" name="p" value="Preference Filter" class="btn btn-success"></</div>
                    </form>
                </div>
            </div> <br>
            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Preference 1 Applicants </a></li>
                    <li><a data-toggle="tab" href="#menu1">Preference 2 Applicants</a></li>
                    <li><a data-toggle="tab" href="#menu2">Preference 3 Applicants</a></li>
                    <li><a data-toggle="tab" href="#menu3">Selected Applicants</a></li>
                    <li><a data-toggle="tab" href="#menu4">Unqualified Applicants</a></li>

                </ul>
                <br>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3>Preference 1 Applicants</h3>
                        <?php
                        $pq1 = mysql_query("select * from "
                                . "application,preference where application.appid= preference.app_id AND (preference.pref1='$courseid' AND status=1) ") or die(mysql_error());

                        if (mysql_num_rows($pq1) == 0) {
                            ?>
                            <div class="alert alert-success">
                                <strong>No any Preference 1 Applications</strong> 
                            </div>
                        <?php } else { ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>NIC</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>A/l Stream</th>
                                         <th>Z score</th>
                                        <th>Gen.Test</th>
                                        <th>English</th>
                                        <th>Maths</th>
                                        <th>Academic Year</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($arow = mysql_fetch_assoc($pq1)) {
                                        ?>

                                        <tr class="warning">
                                            <td><?php print( ++$count1); ?></td>
                                            <td><?php print( $arow['name_with_init']); ?></td>
                                            <td><?php print( $arow['age']); ?></td>
                                            <td><?php print( $arow['nic']); ?></td>
                                            <td><?php print( $arow['gender']); ?></td>
                                            <td><?php print( $arow['telno']); ?></td>
                                            <td><?php print( $arow['a/l_stream']); ?></td>
                                            <td><?php print( $arow['z_score']); ?></td>
                                            <td><?php print( $arow['gen_test']); ?></td>
                                            <td><?php print( $arow['o/l_english']); ?></td>
                                            <td><?php print( $arow['o/l_maths']); ?></td>
                                            <td>20<?php print( $arow['acedemic_year']); ?></td>

                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        <?php }
                        ?>

                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3>Preference 2 Applicants</h3>
                        <?php
                        $pq2 = mysql_query("select * from "
                                . "application,preference where application.appid= preference.app_id AND (preference.pref2='$courseid' AND status=1) ") or die(mysql_error());

                        if (mysql_num_rows($pq2) == 0) {
                            ?>
                            <div class="alert alert-success">
                                <strong>No any Preference 2 Applications</strong> 
                            </div>
                        <?php } else { ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>NIC</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>A/l Stream</th>
                                         <th>Z score</th>
                                        <th>Gen.Test</th>
                                        <th>English</th>
                                        <th>Maths</th>
                                        <th>Academic Year</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($arow = mysql_fetch_assoc($pq2)) {
                                        ?>

                                        <tr class="warning">
                                            <td><?php print( ++$count2); ?></td>
                                            <td><?php print( $arow['name_with_init']); ?></td>
                                            <td><?php print( $arow['age']); ?></td>
                                            <td><?php print( $arow['nic']); ?></td>
                                            <td><?php print( $arow['gender']); ?></td>
                                            <td><?php print( $arow['telno']); ?></td>
                                            <td><?php print( $arow['a/l_stream']); ?></td>
                                            <td><?php print( $arow['z_score']); ?></td>
                                            <td><?php print( $arow['gen_test']); ?></td>
                                            <td><?php print( $arow['o/l_english']); ?></td>
                                            <td><?php print( $arow['o/l_maths']); ?></td>
                                            <td>20<?php print( $arow['acedemic_year']); ?></td>

                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        <?php }
                        ?>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <h3>Preference 3 Applicants</h3>

                        <?php
                        $pq3 = mysql_query("select * from "
                                . "application,preference where application.appid= preference.app_id AND (preference.pref3='$courseid' AND status=1) ") or die(mysql_error());

                        if (mysql_num_rows($pq3) == 0) {
                            ?>
                            <div class="alert alert-success">
                                <strong>No any Preference 1 Applications</strong> 
                            </div>
                        <?php } else { ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>NIC</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>A/l Stream</th>
                                         <th>Z score</th>
                                        <th>Gen.Test</th>
                                        <th>English</th>
                                        <th>Maths</th>
                                        <th>Academic Year</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($arow = mysql_fetch_assoc($pq3)) {
                                        ?>

                                        <tr class="warning">
                                            <td><?php print( ++$count3); ?></td>
                                            <td><?php print( $arow['name_with_init']); ?></td>
                                            <td><?php print( $arow['age']); ?></td>
                                            <td><?php print( $arow['nic']); ?></td>
                                            <td><?php print( $arow['gender']); ?></td>
                                            <td><?php print( $arow['telno']); ?></td>
                                            <td><?php print( $arow['a/l_stream']); ?></td>
                                            <td><?php print( $arow['z_score']); ?></td>
                                            <td><?php print( $arow['gen_test']); ?></td>
                                            <td><?php print( $arow['o/l_english']); ?></td>
                                            <td><?php print( $arow['o/l_maths']); ?></td>
                                            <td>20<?php print( $arow['acedemic_year']); ?></td>

                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        <?php }
                        ?>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <h3>Selected Applicants</h3>
                        <?php
                        $pq4 = mysql_query("select * from "
                                . "application,preference where application.appid= preference.app_id AND (preference.pref1='$courseid' or preference.pref2='$courseid' or preference.pref3='$courseid') AND (application.status=2) ") or die(mysql_error());

                        if (mysql_num_rows($pq4) == 0) {
                            ?>
                            <div class="alert alert-success">
                                <strong>No any Selected Applications</strong> 
                            </div>
                        <?php } else { ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>NIC</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>A/l Stream</th>
                                         <th>Z score</th>
                                        <th>Gen.Test</th>
                                        <th>English</th>
                                        <th>Maths</th>
                                        <th>Academic Year</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($arow = mysql_fetch_assoc($pq4)) {
                                        ?>

                                        <tr class="warning">
                                            <td><?php print( ++$count4); ?></td>
                                            <td><?php print( $arow['name_with_init']); ?></td>
                                            <td><?php print( $arow['age']); ?></td>
                                            <td><?php print( $arow['nic']); ?></td>
                                            <td><?php print( $arow['gender']); ?></td>
                                            <td><?php print( $arow['telno']); ?></td>
                                            <td><?php print( $arow['a/l_stream']); ?></td>
                                            <td><?php print( $arow['z_score']); ?></td>
                                            <td><?php print( $arow['gen_test']); ?></td>
                                            <td><?php print( $arow['o/l_english']); ?></td>
                                            <td><?php print( $arow['o/l_maths']); ?></td>
                                            <td>20<?php print( $arow['acedemic_year']); ?></td>

                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        <?php }
                        ?>
                    </div>
                    <div id="menu4" class="tab-pane fade">
                        <h3>Unqualified Applicants</h3>
                        <?php
                        $pq5 = mysql_query("select * from "
                                . "application,preference where application.appid= preference.app_id AND (preference.pref1='$courseid' or preference.pref2='$courseid' or preference.pref3='$courseid') AND (application.status=3) ") or die(mysql_error());

                        if (mysql_num_rows($pq5) == 0) {
                            ?>
                            <div class="alert alert-success">
                                <strong>No any unqualifiedly Applications</strong> 
                            </div>
                        <?php } else { ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>NIC</th>
                                        <th>Gender</th>
                                        <th>Contact</th>
                                        <th>A/l Stream</th>
                                        <th>Z score</th>
                                        <th>Gen.Test</th>
                                        <th>English</th>
                                        <th>Maths</th>
                                        <th>Academic Year</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($arow = mysql_fetch_assoc($pq5)) {
                                        ?>

                                        <tr class="danger">
                                            <td><?php print( ++$count5); ?></td>
                                            <td><?php print( $arow['name_with_init']); ?></td>
                                            <td><?php print( $arow['age']); ?></td>
                                            <td><?php print( $arow['nic']); ?></td>
                                            <td><?php print( $arow['gender']); ?></td>
                                            <td><?php print( $arow['telno']); ?></td>
                                            <td><?php print( $arow['a/l_stream']); ?></td>
                                            <td><?php print( $arow['z_score']); ?></td>
                                            <td><?php print( $arow['gen_test']); ?></td>
                                            <td><?php print( $arow['o/l_english']); ?></td>
                                            <td><?php print( $arow['o/l_maths']); ?></td>
                                            <td>20<?php print( $arow['acedemic_year']); ?></td>

                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

</body>
</html>
