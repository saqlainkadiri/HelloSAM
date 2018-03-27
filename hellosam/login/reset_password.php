<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);

include('../db_connection.php');
$db = new DB_FUNCTIONS();

if(isset($_POST["reset-password"])) {
    $token=$_GET["token"];
    $email=$db->check_token($token);
    $password=$_POST["newpass"];
    $result=$db->reset_password($email,$password);
    $delete_token=$db->delete_token($email);
    if($result){
        echo "<script>alert('Password Reset Successful. Login Again!');
                  window.location = 'login.php'; </script>";
    }
    else{
        echo "<script>alert('Password reset unsuccessful! Please try again');</script>";
    }
}

if(isset($_GET["magic_coffee"])) {

    ?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>Reset password</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
        <meta name="viewport" content="width=device-width"/>
        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- Animation library for notifications   -->
        <link href="../assets/css/animate.min.css" rel="stylesheet"/>
        <link href="../assets/css/style.css" rel="stylesheet" type='text/css'/>
        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet"/>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="../assets/css/material-icons.css" rel='stylesheet' type='text/css'>
    </head>
    <body class="login-page">
    <div class="login-box">
        <div class="login-box-body">
            <div class="panel-header">
                <h2 class="text-center">
                    <img src="../assets/img/Intellinects.png" alt="Logo">
                </h2>
            </div>
            <form method="POST" name="frmReset" id="frmReset" action="" onSubmit="return validate_password_reset();">
                <div id="validation-message">
                    <?php if (!empty($error_message)) { ?>
                        <?php echo $error_message; ?>
                    <?php } ?>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <input id="newpass" type="password" class="form-control text-field" placeholder="New password"
                               name="newpass" value="" required="" autofocus="">
                        <div class="input-group-addon"><i class="material-icons">password</i></div>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <input id="confirmpass" type="password" class="form-control text-field"
                               placeholder="Confirm password" name="confirmpass" value="" required="" autofocus="">
                        <div class="input-group-addon"><i class="material-icons">password</i></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" name="reset-password" id="reset-password" class="btn btn-block login-btn">
                            Reset password
                        </button>
                    </div>
                </div>
                <div class="clearfix"> &nbsp;</div>
            </form>
            <!-- /.social-auth-links -->
            <div class="row">
                <div class="col-md-12">
                    <a href="login.php">Login ! if already Registered.</a>
                </div>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div>
    </body>
    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/common.js"></script>
    <script>
        function validate_password_reset() {
            if (document.getElementById("newpass").value != document.getElementById("confirmpass").value) {
                document.getElementById("validation-message").innerHTML = "Both password should be same!";
                return false;
            }
            return true;
        }
    </script>
    </html>

    <?php

}
else{
    $db->redirect_to('login.php');
}
?>