<?php
include "header.php";
include('../db_connection.php');
$db = new DB_FUNCTIONS();
$getadmissiondata = $db ->getadmissiondata();
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Students</h2>
    </div>
    <div class="col-lg-2">
    	<a ui-sref="index.offersNew" class="btn btn-primary m-t-md pull-right" href="add_admission.php">Add New</a>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="i-box">
            	<div class="ibox-content p-n">
            		<div>
                        <table style="table table-striped" class="table m-n">
                            <thead>
                            <tr>
                                <th>Roll No</th>
                                <th>Name</th>
                                <th>Class ID</th>
                                <th>Dept</th>
                                <th>Student Email</th>
                                <th>Parent Email</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php
                        if($getadmissiondata) {
                            foreach ($getadmissiondata as $row) {
                                $s_rollno = $row['s_rollno'];
                                $s_name=$row['s_name'];
                                $s_email=$row['s_email'];
                                $p_email=$row['p_email'];
                                $class_id=$row['class_id'];
                                $dept_name=$row['dept_name'];
                                echo '
                                <tr role="row" class="odd">
                                        <td class="sorting_1">' . $s_rollno . '</td>
                                        <td class="sorting_1">' . $s_name . '</td>
                                        <td class="sorting_1">'.$class_id.'</td>
                                        <td class="sorting_1">'.$dept_name.'</td>
                                        <td class="sorting_1">'.$s_email.'</td>
                                        <td class="sorting_1">'.$p_email.'</td>
                                    <td>
									</td>
                                </tr>';
                            }
                        }
                        ?>
						    </tbody>
						</table>
					</div>
            	</div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<?php
    include "footer.php";
?>