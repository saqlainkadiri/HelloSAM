<?php
session_start();
    include "header.php";

function getadmissiondata()
{
    $conn = mysqli_connect("localhost", "root", "", "hellosam");
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

function add_result($t_id,$sub_id,$s_roll,$s_marks)
{
    $conn = mysqli_connect("localhost", "root", "", "hellosam");
    $exam_id='E001';
    $query = "INSERT INTO result(t_id,sub_id,s_rollno,marks,exam_id) VALUES ('$t_id','$sub_id','$s_roll','$s_marks','$exam_id');";
    $result = mysqli_query($conn, $query);
    return $result;
}

if(isset($_POST['submit'])){
    $s_roll = $_POST['s_roll'];
    $s_name = $_POST['s_name'];
    $sub1 = $_POST['sub1'];
    $sub2 = $_POST['sub2'];
    $sub3 = $_POST['sub3'];
    $sub4 = $_POST['sub4'];
    $sub5 = $_POST['sub5'];
    $sub6 = $_POST['sub6'];
    $t_id = $_SESSION['s_email'];
    add_result($t_id,'S001',$s_roll,$sub1);
    add_result($t_id,'S002',$s_roll,$sub1);
    add_result($t_id,'S003',$s_roll,$sub1);
    add_result($t_id,'S004',$s_roll,$sub1);
    add_result($t_id,'S005',$s_roll,$sub1);
    add_result($t_id,'S006',$s_roll,$sub1);

}

echo '      <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Student academic details</h5>

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

                            <table class="footable table table-stripped toggle-arrow-tiny">
                                <thead>
                                <tr>
                                    <th>Roll No.</th>
                                    <th>Name</th>
                                    <th>Sub1</th>
                                    <th>Sub2</th>
                                    <th>Sub3</th>
                                    <th>Sub4</th>
                                    <th>Sub5</th>
                                    <th>Sub6</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>';
                                $getadmissiondata=getadmissiondata();
                                foreach ($getadmissiondata as $data) {
                                    echo ' 
                                <tr>
                                    <form action="gen_result.php" method="post">
                                    <td>'.$data['s_rollno'].'</td>
                                    <td>'.$data['s_name'].'</td>
                                    <div class="form-group"><input type="hidden" id="s_roll" name="s_roll" class="form-control" value="'.$data["s_rollno"].'"></div>
                                    <div class="form-group"><input type="hidden" id="s_name" name="s_name" class="form-control" value="'.$data["s_name"].'"></div>
                                    <td><div class="form-group"><input type="text" id="sub1" name="sub1" class="form-control"></div></td>
                                    <td><div class="form-group"><input type="text" id="sub2" name="sub2" class="form-control"></div></td>
                                    <td><div class="form-group"><input type="text" id="sub3" name="sub3" class="form-control"></div></td>
                                    <td><div class="form-group"><input type="text" id="sub4" name="sub4" class="form-control"></div></td>
                                    <td><div class="form-group"><input type="text" id="sub5" name="sub5" class="form-control"></div></td>
                                    <td><div class="form-group"><input type="text" id="sub6" name="sub6" class="form-control"></div></td>
                                    <td><div class="form-group"><input type="submit" name="submit" class="form-control"></div></td>
                                    </form>
                                </tr>';
                                }
                                echo '</tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>';
    include "footer.php";
?>