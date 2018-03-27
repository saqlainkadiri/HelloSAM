<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "hellosam");

$coln=date("Y-m-d");
if(isset($_COOKIE['Subject'])){
	$sub=$_COOKIE['Subject'];
	$ts=$_COOKIE['ts'];
	$te=$_COOKIE['te'];
				
$result = $conn->query("SELECT a.`s_roll`, s.`s_name`, s.`s_email`, GROUP_CONCAT(a.`sub_id`) as `subject` FROM admission s inner join attend a on s.s_rollno = a.s_roll where a.date like '%$coln%' and a.`time_from` = '$ts' and a.`time_to` = '$te' group by s.`s_rollno` order by s.`s_rollno`");
//$result1 = $result->fetch_array(MYSQLI_ASSOC);

//print_r($result->fetch_array(MYSQLI_ASSOC));

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"s_roll":"'  . $rs["s_roll"] . '",';
	$outp .= '"s_name":"'  . $rs["s_name"] . '",';
	$outp .= '"s_email":"'  . $rs["s_email"] . '",';
    $outp .= '"sub_id":"'  . $rs["subject"] . '"}';
}
$outp ='{"data":['.$outp.']}';
$conn->close();

echo($outp);
}
?>