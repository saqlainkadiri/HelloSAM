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

if(isset($_POST['email'])){
    $s_email = $_POST["email"];
    $s_name = $_POST["name"];
    $p_email = $_POST["pemail"];
    $p_name = $_POST["pname"];
    $s_rollno = $_POST["s_rollno"];
    $add_admission = $db->add_admission($s_rollno,$s_email,$s_name,$p_email,$p_name);
    if(isset($_POST['email'])) {
        $mail = new PHPMailer(true);
        $email_address = $_POST['email'];
        $email_address1 = $_POST['pemail'];
        $token = md5(bin2hex(openssl_random_pseudo_bytes(32)));
        $token1 = md5(bin2hex(openssl_random_pseudo_bytes(32)));
        $emailBody = "<div>
<br>
<p>Click this link to reset your password<br>
<a href='http://localhost/hellosam/login/signup.php?user_role=student&s_email=".$s_email."&s_rollno=".$s_rollno."'>http://localhost/hellosam/login/signup.php?user_role=student&s_email=".$s_email."&s_rollno=".$s_rollno."</a>
</p>Regards,<br> Admin.</div>";
        $emailBody1 = "<div>
<br>
<p>Click this link to reset your password<br>
<a href='http://localhost/hellosam/login/signup.php?user_role=parent&s_email=".$p_email."&s_rollno=-1'>http://localhost/hellosam/login/signup.php?user_role=parent&s_email=".$p_email."&s_rollno=-1</a>
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
            $mail->setFrom('YOUR_EMAIL', 'Email Verification');
            $mail->addAddress($email_address, 'Email Verification');
            $mail->addReplyTo('YOUR_EMAIL', 'Email Verification');
            $mail->isHTML(true);
            $mail->Subject = 'Email Verification';
            $mail->Body = $emailBody;

            $mail->send();
            $db->update_token($token, $email_address);
            echo "<script>alert('Email sent!');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. !');</script>";
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        $mail1 = new PHPMailer(true);
        try {
            //Server settings
            $mail1->SMTPDebug = 0;
            $mail1->isSMTP();
            $mail1->Host = 'smtp.gmail.com';
            $mail1->SMTPAuth = true;
            $mail1->Username = 'YOUR_EMAIL';
            $mail1->Password = 'YOUR_PASSWORD';
            $mail1->SMTPSecure = 'ssl';
            $mail1->Port = 465;
            $mail1->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail1->setFrom('YOUR_EMAIL', 'Email Verification');
            $mail1->addAddress($email_address1, 'Email Verification');
            $mail1->addReplyTo('YOUR_EMAIL', 'Email Verification');
            $mail1->isHTML(true);
            $mail1->Subject = 'Email Verification';
            $mail1->Body = $emailBody1;

            $mail1->send();
            $db->update_token($token1, $email_address1);
            echo "<script>alert('Email sent!');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. !');</script>";
            echo 'Mailer Error: ' . $mail1->ErrorInfo;
        }
    }
}
echo'
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Add Student</h5>
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
                <form method="post" class="form-horizontal">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Student Roll No</label>
                        <div class="col-sm-10"><input type="text" name="s_rollno" id="s_rollno" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Student Name</label>
                        <div class="col-sm-10"><input type="text" name="name" id="name" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Student Email</label>
                        <div class="col-sm-10"><input type="email" name="email" id="email" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Parent Name</label>
                        <div class="col-sm-10"><input type="text" name="pname" id="pname" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Parent Email</label>
                        <div class="col-sm-10"><input type="email" name="pemail" id="pemail" class="form-control"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-white" type="submit">Cancel</button>
                            <button class="btn btn-primary" name="submit" type="button" onclick="check_student_validations();">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>';
include "footer.php";
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

    function check_student_validations(){

        var rollno = $('#s_rollno').val();
        $.ajax({
            type:"POST",
            url:"checkRollNo.php",
            data: { rollno: rollno },
            success:function(result){
                //alert(result);
                if(result == 0){
                    add_admission();
                }
                else{
                    alert('Roll No Already Exists!');
                    return false;
                }
            }
        });
    }

    function add_admission() {

        var s_rollno = $('#s_rollno').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var pname = $('#pname').val();
        var pemail = $('#pemail').val();
        $.ajax({
            type:"POST",
            url:"add_admission.php",
            data: { s_rollno: s_rollno,
                name:name,
                email:email,
                pname:pname,
                pemail:pemail
            },
            success:function(result){

            alert("Student Added.");
            }
        });

    }
</script>



