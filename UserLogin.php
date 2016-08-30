<?php
$umail = "";
$upw = "";

if (isset($_COOKIE['usermail']) && isset($_COOKIE['userpw'])) {  
    echo 'sted cookies';
    $umail = $_COOKIE['usermail'];
    $upw = $_COOKIE['userpw'];
} else
    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/newuserjs.js"></script>
        <title>SLIATE SRP - Login</title>
    </head>
    <body>

        <nav class="navbar navbar-default navbar-fixed-top"></nav>
        <div class="container">



            <div class="jumbotron" style="text-align: center; background: transparent;">
                <h2>SLIATE Student Registration Portal</h2>
                <img src="logo.jpg">
            </div>

            <div class="jumbotron" style="alignment-adjust: central; width: 600px; margin: auto;">
                <?php if (isset($_GET['msg'])) { ?>
                    <div class="alert alert-danger">
                        <strong><?php print($_GET['msg']); ?></strong> 
                    </div>
                <?php } ?>
                <form action="LoginControler.php" method="post">

                    <div style="margin-left: 0px;" class="row">
                        <div style="width:500px; " class="col-sm-5">                       
                            <div class="input-group">
                                <span class="input-group-addon"><label for="email">E mail &nbsp;</label>
                                    <span class="glyphicon glyphicon-send"></span></span>
                                <input type="email" value="<?php print($umail); ?>"  class="form-control"  name="email" required="required">
                            </div>                   
                        </div>
                    </div><br>

                    <div style="margin-left: 0px;" class="row">
                        <div style="width:500px; " class="col-sm-5">                       
                            <div class="input-group">
                                <span class="input-group-addon"><label for="pw">Password  &nbsp;</label>
                                    <span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" value="<?php print($upw); ?>" class="form-control" id="pw" name="pw" required="required">
                            </div>                   
                        </div>
                    </div><br>



                    <input checked="checked" name="remember" value="1"  style="margin-left: 15px;" type="checkbox" >&nbsp;Keep me logged in


                    <input style="margin-left: 310px; width: 170px" type="submit" class="btn btn-success" value="Sign in">


                </form>

            </div>

        </div>

    </body>
</html>
