<?php
session_start();
    include "header.php";
function get_result_data_from_roll($student_roll){
    $conn = mysqli_connect("localhost", "root", "", "hellosam");
    $query = "SELECT * from result where s_rollno = '$student_roll';";
    $result = mysqli_query($conn,$query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

}

function get_student_data_from_email($student_email){
    $conn = mysqli_connect("localhost", "root", "", "hellosam");
    $query = "SELECT * from admission where s_email = '$student_email';";
    $result = mysqli_query($conn,$query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

}

function getsubjectsbyid($sub_id)
{
    $conn = mysqli_connect("localhost", "root", "", "hellosam");
    $query = "select * from class where sub_id='$sub_id' and class_id='C001';";
    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }
}

$student = get_student_data_from_email($_SESSION['s_email']);
$stud_id = '';
foreach ($student as $stud){
    $stud_id = $stud['s_rollno'];
}


$html = '<html>
<head>
    <meta charset="utf-8">
    <title>Result Sheet</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container lor-cont">
					<table class="table table-bordered" style="margin:auto;text-align:left;" >
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Marks</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>';
$result = get_result_data_from_roll($stud_id);
$total_marks = 0;
foreach ($result as $res){
    $res_marks = $res['marks'];
    $total_marks += $res_marks;
    $grade='';
    if($res_marks>=80){
        $grade = 'A';
    }
    else if($res_marks>=60){
        $grade = 'B';
    }
    else if($res_marks>=40){
        $grade = 'C';
    }
    else{
        $grade = 'D';
    }
    $res_sub_id = $res['sub_id'];
    $getsubjects = getsubjectsbyid($res_sub_id);
    foreach ($getsubjects as $sub){
        $sub_name = $sub['sub_name'];
        $html .=' <tr>
                                <td>'.$sub_name.'</td>
                                <td>'.$res_marks.'</td>
                                <td>'.$grade.'</td>
                            </tr>';
    }
}
$html .='						
						<tr>
						<td>
						Total
                        </td>
                        <td colspan="2">
                        '.$total_marks.'
                        </td>
                        </tr>
						<tr>
						<td>
						Percentage
                        </td>
                        <td colspan="2">
                        '.floatval($total_marks/6).'
                        </td>
                        </tr>
						</tbody>
					</table>
		</div>
</body>
</html>';
echo $html;
    include "footer.php";
?>