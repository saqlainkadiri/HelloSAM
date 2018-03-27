<?php
session_start();
include "header.php";
error_reporting(E_ALL ^ E_DEPRECATED);
include('../db_connection.php');
$db = new DB_FUNCTIONS();
$getsubjects = $db ->getsubjects();
echo '      <div class="wrapper wrapper-content animated fadeInRight">
          <div class="row">
              <div class="col-lg-12">
                  <div class="ibox float-e-margins">
                      <div class="ibox-title">
                          <h5>Take Attendance</h5>
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
                          <form class="form-horizontal">
                              <div class="form-group"><label class="col-sm-2 control-label">Department</label>
                                  <div class="col-sm-10"><select class="form-control m-b">
                                          <option>COMPS</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group"><label class="col-sm-2 control-label">Subject</label>
                                  <div class="col-sm-10"><select class="form-control m-b" id="subject">';
                                            if($getsubjects){
                                                foreach ($getsubjects as $row) {
                                                    echo '<option value="'.$row["sub_id"].'">'.$row["sub_name"].'</option>';
                                                }
                                            }
                                  echo '   </select>
                                  </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group"><label class="col-sm-2 control-label">Time From</label>

                                  <div class="col-sm-4"><select class="form-control m-b" id="time_from">
                                          <option value="08:00">08:00</option>
                                          <option value="09:00">09:00</option>
                                          <option value="10:00">10:00</option>
                                          <option value="11:00">11:00</option>
                                      </select>
                                  </div>
                                  <label class="col-sm-2 control-label">Time Till</label>

                                  <div class="col-sm-4"><select class="form-control m-b" id="time_till">
                                          <option value="09:00">09:00</option>
                                          <option value="10:00">10:00</option>
                                          <option value="11:00">11:00</option>
                                          <option value="12:00">12:00</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="hr-line-dashed"></div>
                              <div class="form-group">
                                  <div class="col-sm-4 col-sm-offset-2">
                                      <button class="btn btn-primary" id="take_attn" onclick="loadstudenttable();">Take Attendance</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-lg-12">
                      <div class="ibox float-e-margins">
                          <div class="ibox-title">
                              <h5>Subject 1</h5>

                              <div class="ibox-tools">
                               
                                  <form action="attendance_xml.php">
                                      <input type="submit" name="download" class="btn btn-primary" value="Download xml">
                                  </form>
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
                                  <thead>';
                                  echo '<tr>

                                      <th data-toggle="true">Student Roll no</th>
                                      <th data-toggle="true">Student Name</th>
                                      <th>Dept Name</th>
                                      <th>Class Id</th>
                                      <th data-hide="all">Student Email</th>
                                      <th>Attended</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  ';
                                        $getstudentdata=$db->getadmissiondata();
                                        if($getstudentdata) {
                                            foreach ($getstudentdata as $row) {
                                                $student_roll = $row['s_rollno'];
                                                $student_name = $row['s_name'];
                                                $department_name = $row['dept_name'];
                                                $class_id = $row['class_id'];
                                                $student_email = $row['s_email'];
                                            echo '                                 
                                      <tr><td>' . $student_roll . '</td><input name="s_rollno[]" type="hidden"  value="' . $student_roll . '">
                                      <td>' . $student_name . '</td>
                                      <td>' . $department_name . '</td>
                                      <td>' . $class_id . '</td>
                                      <td>' . $student_email . '</td><td>';
                                            if ($db->check_attend($student_roll,$_SESSION['s_email'])) {
                                                echo '<input name="attn[]" type="checkbox" class="i-checks" value="' . $student_roll . '">';
                                            } else {
                                                echo '<input name="attn[]" type="checkbox" class="i-checks" value="' . $student_roll . '" checked>';
                                            }
                                            echo '</td></tr>';
                                        }
                                    }
                                 echo '</tbody>
                              </table>
                              <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" id="todaysattn" onclick="todaysattn();">Save Todays Attendance</button>
                                </div>
                            </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    function loadstudenttable(){
        $.ajax({
            type:"GET",
            url:"loadstudenttable.php",
            success:function(result){
                $("#loadstudenttable").html(result);
            }
        });
    }
    function todaysattn(){
        var time_from = $("#time_from").val();
        var time_till = $("#time_till").val();
        var subject = $("#subject").val();
        
        var s_rollno = [];
        var vs_rollno = document.getElementsByName("s_rollno[]");
		var attn = [];
        var vattn = document.getElementsByName("attn[]");
		for(var a=0; a < vattn.length; a++)  {
			if(vattn[a].checked){
			    attn.push("1");
			}
			else{
			    attn.push("0");
			}
		}
		var jsonattn = JSON.stringify(attn);
		var jsons_rollno = JSON.stringify(s_rollno);
		$.ajax({
            type:"POST",
            url:"todaysattn.php",
            data:{
                jsonattn:jsonattn,
                time_till:time_till,
                time_from:time_from,
                subject:subject
            },
            success:function(result){
                alert(result);
               // $("#todaysattn").html(result);
            }
        });
    }
</script>';
    include "footer.php";
    ?>
