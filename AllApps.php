<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require './Model/DBconnection.php';
require './SessionHandler.php';
$count = 0;
$count2 = 0;
$count3 = 0;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/registerjs.js"></script>
        <title>SLIATE SRP - Application Viewer</title>

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
                <h1>Application View Portal</h1>
            </div>
            <div class="well">
                <span class="input-group-addon"><label >Filter the application to make sure the 1st step of Application selecting process &nbsp;</label>
                    <form action="AppFilter.php"><input type="submit" value="Filter Applications" class="btn btn-success"></form>
                    <span class="glyphicon glyphicon-send"></span></span>

            </div>

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">All Applications</a></li>
                <li><a data-toggle="tab" href="#menu1">Filtered Application</a></li>
                <li><a data-toggle="tab" href="#menu2">Banned Application</a></li>

            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>All Applications</h3>

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
                                <th>Gen.Test</th>
                                <th>English</th>
                                <th>Maths</th>
                                <th>Academic Year</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $all = mysql_query("select * from application ")or die(mysql_errno());
                            while ($arow = mysql_fetch_assoc($all)) {
                                ?>

                                <tr class="success">
                                    <td><?php print( ++$count); ?></td>
                                    <td><?php print( $arow['name_with_init']); ?></td>
                                    <td><?php print( $arow['age']); ?></td>
                                    <td><?php print( $arow['nic']); ?></td>
                                    <td><?php print( $arow['gender']); ?></td>
                                    <td><?php print( $arow['telno']); ?></td>
                                    <td><?php print( $arow['a/l_stream']); ?></td>
                                    <td><?php print( $arow['gen_test']); ?></td>
                                    <td><?php print( $arow['o/l_english']); ?></td>
                                    <td><?php print( $arow['o/l_maths']); ?></td>
                                    <td><?php print( $arow['acedemic_year']); ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Filtered Application</h3>
                    <?php
                    $all = mysql_query("select * from application where status='1'") or die(mysql_errno());
                    if (mysql_num_rows($all) > 0) {
                        ?>
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
                                    <th>Gen.Test</th>
                                    <th>English</th>
                                    <th>Maths</th>
                                    <th>Academic Year</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($arow = mysql_fetch_assoc($all)) {
                                    ?>

                                    <tr class="warning">
                                        <td><?php print( ++$count2); ?></td>
                                        <td><?php print( $arow['name_with_init']); ?></td>
                                        <td><?php print( $arow['age']); ?></td>
                                        <td><?php print( $arow['nic']); ?></td>
                                        <td><?php print( $arow['gender']); ?></td>
                                        <td><?php print( $arow['telno']); ?></td>
                                        <td><?php print( $arow['a/l_stream']); ?></td>
                                        <td><?php print( $arow['gen_test']); ?></td>
                                        <td><?php print( $arow['o/l_english']); ?></td>
                                        <td><?php print( $arow['o/l_maths']); ?></td>
                                        <td><?php print( $arow['acedemic_year']); ?></td>

                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                            <div class="alert alert-success">
                                <strong>No any Filtered Applications</strong> 
                            </div>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div id="menu2" class="tab-pane fade">
                    <h3>Banned Application</h3>
                    <?php
                    $allb = mysql_query("select * from application where status='0' ") or die(mysql_errno());
                    if (mysql_num_rows($allb) > 0) {
                        ?>
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
                                    <th>Gen.Test</th>
                                    <th>English</th>
                                    <th>Maths</th>
                                    <th>Academic Year</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($arowb = mysql_fetch_assoc($allb)) {
                                    ?>

                                    <tr class="danger">
                                        <td><?php print( ++$count3); ?></td>
                                        <td><?php print( $arowb['name_with_init']); ?></td>
                                        <td><?php print( $arowb['age']); ?></td>
                                        <td><?php print( $arowb['nic']); ?></td>
                                        <td><?php print( $arowb['gender']); ?></td>
                                        <td><?php print( $arowb['telno']); ?></td>
                                        <td><?php print( $arowb['a/l_stream']); ?></td>
                                        <td><?php print( $arowb['gen_test']); ?></td>
                                        <td><?php print( $arowb['o/l_english']); ?></td>
                                        <td><?php print( $arowb['o/l_maths']); ?></td>
                                        <td><?php print( $arowb['acedemic_year']); ?></td>

                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                            <div class="alert alert-success">
                                <strong>No any Banned Applications</strong> 
                            </div>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
    </body>
</html>
