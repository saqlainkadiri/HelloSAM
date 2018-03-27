<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
include('../db_connection.php');
$db = new DB_FUNCTIONS();
$jsonattn = $_POST['jsonattn'];
$time_till = $_POST['time_till'];
$time_from = $_POST['time_from'];
$subject = $_POST['subject'];
$t_email= $_SESSION["s_email"];
$getadmissiondata = $db->getadmissiondata();
foreach($getadmissiondata as $row){
    $s_rollno[] = $row["s_rollno"];
}
$insert_todays_attendance = $db->insert_todays_attendance($s_rollno,$jsonattn,$time_from,$time_till,$subject,$t_email);
?>
