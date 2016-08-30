<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/newuserjs.js"></script>
        <title>SLIATE SRP - Administrative Login</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top"></nav>
        <div class="jumbotron" style="text-align: center; background: transparent;">
            <h2>SLIATE Student Registration Portal</h2>
            <h3>Administrative Login</h3>
        </div>

        <div class="jumbotron" style="alignment-adjust: central; width: 600px; margin: auto;">
            <?php if (isset($_GET['msg'])) { ?>
                <div class="alert alert-danger">
                    <strong><?php print($_GET['msg']); ?></strong> 
                </div>
            <?php } ?>
            <form action="adminlog.php" method="post">

                <div style="margin-left: 0px;" class="row">
                    <div style="width:500px; " class="col-sm-5">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="email">E mail &nbsp;</label>
                                <span class="glyphicon glyphicon-send"></span></span>
                            <input type="email" value=""  class="form-control"  name="email" required="required">
                        </div>                   
                    </div>
                </div><br>

                <div style="margin-left: 0px;" class="row">
                    <div style="width:500px; " class="col-sm-5">                       
                        <div class="input-group">
                            <span class="input-group-addon"><label for="pw">Password  &nbsp;</label>
                                <span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" value="" class="form-control" id="pw" name="pw" required="required">
                        </div>                   
                    </div>
                </div><br>

                <input style="margin-left: 310px; width: 170px" type="submit" class="btn btn-success" value="Sign in">


            </form>
        </div>
    </body>
</html>
