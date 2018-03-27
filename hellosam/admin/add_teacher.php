<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include "header.php";
include('../db_connection.php');
$db = new DB_FUNCTIONS();
$getsubjects = $db ->getsubjects();
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

if(isset($_POST['submit'])){
    $t_id = $_POST["email"];
    $t_email = $_POST["email"];
    $t_name = $_POST["name"];
    $t_subjects = $_POST["subject"];
    $user_role = "teacher";
    $add_teacher = $db->add_teacher($t_id,$t_email,$t_name,$t_subjects,$user_role);
    if(isset($_POST['email'])) {
        $mail = new PHPMailer(true);
        $email_address = $_POST['email'];
        $token = md5(bin2hex(openssl_random_pseudo_bytes(32)));
        $emailBody = "<div>
<br>
<p>Click this link to reset your password<br>
<a href='http://localhost/hellosam/login/signup.php?user_role=".$user_role."&s_email=".$t_email."'>http://localhost/hellosam/login/signup.php?user_role=".$user_role."&s_email=".$t_email."</a>
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
            $mail->setFrom('YOUR_EMAIL', 'Password Reset Mail');
            $mail->addAddress($email_address, 'Password Reset Mail');
            $mail->addReplyTo('YOUR_EMAIL', 'Password Reset Mail');
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Mail';
            $mail->Body = $emailBody;

            $mail->send();
            $db->update_token($token, $email_address);
            echo "<script>alert('Email sent!');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. !');</script>";
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
}
echo'
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add teacher</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="post" action="add_teacher.php" class="form-horizontal">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10"><input type="text" name="name" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10"><input type="email" name="email" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Subject</label>
                        <div class="col-sm-10"><select class="form-control m-b" name="subject">';
                        if($getsubjects){
                            foreach ($getsubjects as $row) {
                                echo'<option value="'.$row["sub_name"].'">'.$row["sub_name"].'</option>';
                            }
                        }
                        echo'</select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" name="submit" type="submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>';
    include "footer.php";
?>