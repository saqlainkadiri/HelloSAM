<?php
error_reporting(E_ALL ^ E_DEPRECATED);
use Twilio\Rest\Client;

include('../db_connection.php');
$db = new DB_FUNCTIONS();
if(isset($_GET['s_rollno'])){
    $s_rollno = $_GET["s_rollno"];
}
if(isset($_GET['s_email'])){
    $s_email = $_GET["s_email"];
}
if(isset($_GET['user_role'])){
    $user_role = $_GET["user_role"];
}
if (isset($_POST['submit'])) {
    $s_email = $_POST["email"];
    $username = $_POST["username"];
    $mobile = $_POST["mobile"];
    $password = md5($_POST["password"]);
    $s_rollno = $_POST["s_rollno"];
    $user_role = $_POST["user_role"];
    $signup = $db->signup($s_rollno,$username,$password,$s_email,$user_role,$mobile);
    if($signup){
        session_start();
        echo "<script>alert('User created successfully');</script>";
        require_once '../twilio-php-master/Twilio/autoload.php'; // Loads the library
        $account_sid = 'YOUR_SID';
        $auth_token = 'YOUR_AUTH_TOKEN';
        $client = new Client($account_sid, $auth_token);
        $mobile="+91".$mobile;
        $messages = $client->messages->create($mobile, array(
            'From' => 'YOUR_TWILIO NUMBER',
            'Body' => 'Your account has been created'
        ));
        $db->redirect_to("login.php");
    }
    else{
        echo "<script>alert('User creation error!');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Signup</title>
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
        <form action="signup.php" method="post">
            <div class="form-group has-feedback">
                <div class="input-group">
                    <?php echo'
                    <input type="hidden" name="email" id="email" value="'.$s_email.'" class="form-control" placeholder="Email">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    <input type="hidden" name="s_rollno" id="s_rollno" value="'.$s_rollno.'" class="form-control" placeholder="S_Rollno">
                    <input type="hidden" name="user_role" id="user_role" value="'.$user_role.'" class="form-control" placeholder="user_role">
                    <div class="input-group-addon"><i class="material-icons">person</i></div>';
                    ?>
                </div>
            </div>
            <div class="form-group has-feedback">
                <div class="input-group">
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile No.">
                    <div class="input-group-addon"><i class="material-icons">person</i></div>
                </div>
            </div>
            <div class="form-group has-feedback">
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-addon"><i class="material-icons">lock</i></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" name="submit" class="btn btn-block login-btn">
                        <center>Register</center>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/common.js"></script>
</html>
