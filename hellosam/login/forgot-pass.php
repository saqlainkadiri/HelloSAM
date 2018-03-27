<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('../db_connection.php');
$db = new DB_FUNCTIONS();

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

if(isset($_POST['email'])){
    $mail = new PHPMailer(true);
    $email_address = $_POST['email'];
    $token = md5(bin2hex(openssl_random_pseudo_bytes(32)));
    $emailBody = "<div>
<br>
<p>Click this link to reset your password<br>
<a href='http://localhost/hellosam/login/reset_password.php?token=" . $token . "&magic_coffee=1'>http://localhost/hellosam/login/reset_password.php?token=" . $token . "&magic_coffee=1</a>
</p>Regards,<br> Admin.</div>";
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'YOUR_EMAIL';
        $mail->Password = 'YOUR_PASSWORD';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->setFrom('YOUR_EMAIL','Password Reset Mail');
        $mail->addAddress($email_address,'Password Reset Mail');
        $mail->addReplyTo('YOUR_EMAIL', 'Password Reset Mail');
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Mail';
        $mail->Body    = $emailBody;

        $mail->send();
        $db->update_token($token,$email_address);
        echo "<script>alert('Please check your email for password reset link!');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. !');</script>";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Forgot password</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>
    <link href="../assets/css/style.css" rel="stylesheet" type='text/css' />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
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
        <form action="forgot-pass.php" method="post">
            <div class="form-group has-feedback">
                <div class="input-group">
                    <input id="email" type="email" class="form-control text-field" name="email" placeholder="Enter your email address">
                    <div class="input-group-addon"><i class="material-icons">email</i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-block login-btn">Send Password Reset Link</button>
                </div>
            </div>
            <div class="clearfix"> &nbsp; </div>
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
</html>
