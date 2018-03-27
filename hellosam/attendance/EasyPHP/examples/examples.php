<?php
session_start();
include("header.php");
require "../src/AntoineAugusti/EasyPHPCharts/Chart.php";
use Antoineaugusti\EasyPHPCharts\Chart;
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Charts</title>
	<link rel="stylesheet" href="chart.css">
	<style>
		*{margin: 0; padding: 0;}
		@import url(http://fonts.googleapis.com/css?family=Roboto);
		/*body{background: #FFF; font-family: 'Roboto', sans-serif;font-weight: 400}
		#content{background: #FFF; width: 1000px; padding: 20px; margin: 0 auto}
		h2{color: #4081BD; margin-bottom: 20px; font-weight: 400}
		.clearBoth:after{width: 300px; border: 1px solid #EEE; margin: 50px 0; display: block;}
		.containerChartLegend{width: 500px;padding-left: 20px}*/
	</style>
	<script src="ChartJS.min.js"></script>
</head>
<body>
	<div id="content">
		<?php
        function get_attendance_details_for_subject($student_roll,$subject_id){
            $conn = mysqli_connect("localhost", "root", "", "hellosam");
            $query = "SELECT * from attend where s_roll = '$student_roll' and attended = 1 and sub_id = '$subject_id';";
            $result = mysqli_query($conn,$query);
            $num_rows = mysqli_num_rows($result);
            return $num_rows;
        }

        function get_leave_details_for_subject($student_roll,$subject_id){
            $conn = mysqli_connect("localhost", "root", "", "hellosam");
            $query = "SELECT * from attend where s_roll = '$student_roll' and attended = 0 and sub_id = '$subject_id';";
            $result = mysqli_query($conn,$query);
            $num_rows = mysqli_num_rows($result);
            return $num_rows;
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

        function getsubjects()
        {
            $conn = mysqli_connect("localhost", "root", "", "hellosam");
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

        $student = get_student_data_from_email($_SESSION['s_email']);
        foreach ($student as $stud){
            $stud_id = $stud['s_rollno'];
        }
        for($i=0;$i<6;$i++){
            $get_leave_details[$i] = get_leave_details_for_subject($stud_id,'S00'.($i+1));
            $get_attendance_details[$i] = get_attendance_details_for_subject($stud_id,'S00'.($i+1));
        }
        $getsubjects=getsubjects();
        foreach ($getsubjects as $sub){
            $sub_name[] = $sub['sub_id'];
        }

        $barChart = new Chart('bar', 'examplebar');
        $barChart->set('data', array(array($get_attendance_details[0],$get_attendance_details[1],$get_attendance_details[2],$get_attendance_details[3],$get_attendance_details[4],$get_attendance_details[5]),
            array($get_leave_details[0],$get_leave_details[1],$get_leave_details[2],$get_leave_details[3],$get_leave_details[4],$get_leave_details[5])));
        $barChart->set('legend',array($sub_name[0],$sub_name[1],$sub_name[2],$sub_name[3],$sub_name[4],$sub_name[5]));
        // We don't to use the x-axis for the legend so we specify the name of each dataset
        $barChart->set('legendData', array('Attended', 'Bunked'));
        $barChart->set('displayLegend', true);
        echo $barChart->returnFullHTML();

        for($i=0;$i<6;$i++) {
            echo '<br/><br/>';
            $pieChart = new Chart('pie', 'examplePie' . ($i + 1));
            $pieChart->set('data', array($get_attendance_details[$i], $get_leave_details[$i]));
            $pieChart->set('legend', array('Attended', 'Bunked'));
            $pieChart->set('displayLegend', true);
            echo $pieChart->returnFullHTML();

        }
        ?>
	</div>
</body>
</html>