<?php
include "header.php";
include('../db_connection.php');
$db = new DB_FUNCTIONS();
$t_email = $_GET["t_email"];
$delete_teacher = $db ->delete_teacher($t_email);
$db ->redirect_to("teacher.php");
?>