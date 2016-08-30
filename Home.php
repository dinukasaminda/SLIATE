<?php
require './SessionHandler.php';
require './Model/DBconnection.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/newuserjs.js"></script>
        <title>SLIATE SRP - Home </title>

        <style type="text/css">
            #base{

                margin: 70px;

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
                <h2>Welcome! <?php print($user); ?></h2>
            </div>

            <div class="row">

                <div class="col-sm-6">
                    <div class="page-header">
                        <h3>Task Dashboard</h3>
                    </div>
                    <ul class="nav nav-divider">
                        <?php
                        $access = mysql_query("select interface.display_name, interface.url from "
                                . "interface,privilage where interface.iface_id=privilage.Interfaces_iface_id AND "
                                . "privilage.UserType_utype_id='$utype' ") or die(mysql_error());

                        while ($pr = mysql_fetch_assoc($access)) {
                            ?>
                            <li role="presentation" ><a href="<?php print($pr['url']); ?>"><?php print($pr['display_name']); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="col-sm-6">                    


                    <div class="page-header">
                        <h3>Application Dashboard</h3>
                    </div>
                    <?php
                    $result = mysql_query("select COUNT(appid) from application") or die(mysql_error());
                    $appcount = mysql_fetch_array($result);
                    ?>

                    <div class="alert alert-info">
                        <strong>Total Application count &nbsp;<?php print($appcount[0]); ?> </strong> 
                    </div>

                    <div class="page-header">
                        <h4>Preference 1 Applications</h4>
                    </div>

                    <?php
                    $result2 = mysql_query("select preference.pref1 as course, COUNT(application.appid) as appcount from "
                            . "application,preference where application.appid= preference.app_id Group by preference.pref1") or die(mysql_error());
                    ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Count</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rowss = mysql_fetch_assoc($result2)) {
                                //echo $rowss['course'] . " " . $rowss['appcount'];
                                $cquery = mysql_query("select course from course where cid='$rowss[course]'");
                                $coursename = mysql_fetch_array($cquery);
                                ?>
                                <tr>
                                    <td><?php print($coursename['course']); ?></td>
                                    <td><?php print($rowss['appcount']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="page-header">
                        <h4>Preference 2 Applications</h4>
                    </div>
                    <?php
                    $result2 = mysql_query("select preference.pref2 as course, COUNT(application.appid) as appcount from "
                            . "application,preference where application.appid= preference.app_id Group by preference.pref2") or die(mysql_error());
                    ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Count</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rowss = mysql_fetch_assoc($result2)) {
                                //echo $rowss['course'] . " " . $rowss['appcount'];
                                $cquery = mysql_query("select course from course where cid='$rowss[course]'");
                                $coursename = mysql_fetch_array($cquery);
                                ?>
                                <tr>
                                    <td><?php print($coursename['course']); ?></td>
                                    <td><?php print($rowss['appcount']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="page-header">
                        <h4>Preference 3 Applications</h4>
                    </div>

                    <?php
                    $result2 = mysql_query("select preference.pref3 as course, COUNT(application.appid) as appcount from "
                            . "application,preference where application.appid= preference.app_id Group by preference.pref3") or die(mysql_error());
                    ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Course</th>
                                <th>Count</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rowss = mysql_fetch_assoc($result2)) {
                                //echo $rowss['course'] . " " . $rowss['appcount'];
                                $cquery = mysql_query("select course from course where cid='$rowss[course]'");
                                $coursename = mysql_fetch_array($cquery);
                                ?>
                                <tr>
                                    <td><?php print($coursename['course']); ?></td>
                                    <td><?php print($rowss['appcount']); ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </body>
</html>
