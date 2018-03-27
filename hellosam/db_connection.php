<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "hellosam");

date_default_timezone_set("Asia/Kolkata");
error_reporting(E_ALL ^ E_DEPRECATED);

class DB_FUNCTIONS
{
    public function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    }

    function redirect_to($new_location)
    {
        header("Location: " . $new_location);
        exit();
    }

    function attempt_login($username, $password)
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "SELECT * FROM user WHERE username = '" . $username . "' AND password = '" . md5($password) . "'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $user;
    }
    function signup($s_rollno,$username,$password,$s_email,$user_role,$mobile){
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "INSERT INTO user(s_rollno, username, password, s_email, user_role, mobile) VALUES ('$s_rollno','$username','$password','$s_email','$user_role','$mobile');";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function reset_password($email, $password)
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "UPDATE user SET password = '" . md5($password) . "' WHERE s_email = '" . $email . "'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function update_token($token, $email)
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "UPDATE user SET token = '" . $token . "' WHERE s_email = '" . $email . "'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function check_token($token)
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "SELECT * FROM user WHERE token = '" . $token . "'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $user["s_email"];
    }

    function delete_token($email)
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "UPDATE user SET token = '' WHERE s_email = '" . $email . "'";
        $result = mysqli_query($conn, $query);
        return $result;
    }

    function getsubjects()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "select * from class;";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }
    function add_teacher($t_id,$t_email,$t_name,$t_subject,$user_role){
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "INSERT INTO teachers(t_id, t_name, t_email, t_subjects, user_role) VALUES ('$t_id','$t_name','$t_email','$t_subject','$user_role');";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function edit_teacher($t_email,$t_name,$t_subjects,$user_role){
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "UPDATE teachers SET t_name = '$t_name',t_subjects = '$t_subjects',user_role = '$user_role' WHERE t_email = '$t_email'";
        $result = mysqli_query($conn, $query);
        return $query;
    }

    function getteachersdata()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "select * from teachers;";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }
    function getteacherbyemail($t_email)
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "select * from teachers WHERE t_email = '$t_email';";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }
    function delete_teacher($t_email){
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "DELETE FROM teachers WHERE t_email =  '$t_email'";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function add_admission($s_rollno,$s_email,$s_name,$p_email,$p_name){
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $dept_name = "COMPS";
        $class_id = "C001";
        $query = "INSERT INTO admission(s_rollno, s_email, s_name, p_name, dept_name, class_id, p_email) VALUES ('$s_rollno','$s_email','$s_name','$p_name','$dept_name','$class_id','$p_email');";
        $result = mysqli_query($conn, $query);
        return $result;
    }
    function getadmissiondata()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $query = "select * from admission;";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function checkstudentvalidations($rollno){
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $sql = "SELECT * FROM admission WHERE s_rollno = '$rollno'";
        $enter = mysqli_query($conn,$sql);
        $ret = @mysqli_num_rows($enter);
        return $ret;
    }
    public function check_attend($student_roll,$t_email){
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $sql1 = "SELECT id FROM teachers WHERE t_email = '$t_email';";
        $result = mysqli_query($conn, $sql1);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = $row["id"];
            }
        }
        $sql = "SELECT * FROM attend WHERE s_roll = '$student_roll' and t_id='$temp' and attended='1'";
        $enter = mysqli_query($conn,$sql);
        $ret = @mysqli_num_rows($enter);
        if($ret>0){
            return false;
        }
        else{
            return true;
        }
    }
    function insert_todays_attendance($getadmissiondata,$jsonattn,$time_from,$time_till,$subject,$t_email){
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $sql1 = "SELECT id FROM teachers WHERE t_email = '$t_email';";
        $result = mysqli_query($conn, $sql1);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $temp = $row["id"];
            }
        }
        $jsonattn = json_decode($jsonattn);
        $n = sizeof($jsonattn);
        for($i=0;$i<$n;$i++){
            if($jsonattn[$i]){
                $query = "INSERT INTO attend(t_id, sub_id, s_roll, time_from, time_to,attended) VALUES ('$temp','$subject','$getadmissiondata[$i]','$time_from','$time_till','$jsonattn[$i]');";
                $result = mysqli_query($conn, $query);
            }
        }
        return $result;
    }
}
?>