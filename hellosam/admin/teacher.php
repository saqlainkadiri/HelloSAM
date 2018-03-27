<?php
include "header.php";
include('../db_connection.php');
$db = new DB_FUNCTIONS();
$getteachersdata = $db ->getteachersdata();
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Teachers</h2>
    </div>
    <div class="col-lg-2">
    	<a ui-sref="index.offersNew" class="btn btn-primary m-t-md pull-right" href="add_teacher.php">Add New</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subjects</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                        <?php
                        if($getteachersdata) {
                            foreach ($getteachersdata as $row) {
                                $t_name = $row['t_name'];
                                $t_email=$row['t_email'];
                                $t_subjects=$row['t_subjects'];
                                echo '
                                <tr role="row" class="odd">
                                        <td class="sorting_1">' . $t_name . '</td>
                                        <td class="sorting_1">'.$t_email.'</td>
                                        <td class="sorting_1">'.$t_subjects.'</td>
                                        <td>
										<a class="btn btn-warning m-n" href="edit_teacher.php?t_email='.$t_email.'">Edit</a>
										<a class="btn btn-danger m-n" href="delete_teacher.php?t_email='.$t_email.'">Delete</a>
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