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

?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Data Tables</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Tables</a>
                        </li>
                        <li class="active">
                            <strong>Data Tables</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5 style="margin-top: -5px;"><b>Name : Shaikh Raees Ibrahim &emsp; Roll No. : 166</b><br>
                        <b>Dept. : Computer Engg &emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; Class : TE. / A </b></h5>
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

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Marks</th>
                        <th>Grade</th>
                    </tr>
                    </thead>
 <?php                   $result = get_result_data_from_roll($stud_id);
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
        ?>
        <tr>
            <td><?php echo $sub_name; ?></td>
                                <td><?php echo $res_marks; ?></td>
                                <td><?php echo $grade; ?></td>
                            </tr>
<?php    }
}	 ?>			
						<tr>
						<td>
						Total
                        </td>
                        <td colspan="2">
                        <?php echo $total_marks; ?>
                        </td>
                        </tr>
						<tr>
						<td>
						Percentage
                        </td>
                        <td colspan="2">
                        <?php echo floatval($total_marks/6); ?>
                        </td>
                        </tr>

                    </tbody>
                    </table>
                    <div class="col-md-offset-5 col-md-2">
                        <div class="form-group">
                            <a href="generate_result.php" target="_blank"><button class="btn btn-primary btn-block" name="download_pdf" type="submit">Save PDF</button>
                        </div>
                    </div>
                        
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>

<?php
    include "footer.php";
?>