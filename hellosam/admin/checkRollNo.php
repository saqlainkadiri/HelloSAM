<?php
include('../db_connection.php');
$db = new DB_FUNCTIONS();
$rollno = $_POST['rollno'];

$checkstudentvalidations = $db->checkstudentvalidations($rollno);
if ($checkstudentvalidations == 0) {
    echo 0;
} else {
    echo 1;
}
?>
