<!DOCTYPE html>
			<?php
			$con=mysqli_connect("localhost","root","","hellosam");
			//$con=mysql_connect("localhost","root","");
			//mysql_select_db("sakec",$con);
			$coln=date("Y-m-d");
			if(isset($_POST['attend'])){
				$sub=$_POST['subject'];
				$ts=$_POST['time_from'];
				$te=$_POST['time_to'];
				//setcookie('dept', $dept, time() + 3600); set cookie for one hour
				setcookie('Subject', $sub);
				setcookie('ts', $ts);
				setcookie('te', $te);
				//header("Location:attendance1.php");
				header("Location:attendance/attendance.php");
				$sql="SELECT ID, S_Name, GROUP_CONCAT( Subject ) AS Subject FROM attend WHERE DATE='$coln' AND Subject='$sub' AND Dept='$dept' GROUP BY ID";
				$select=mysqli_query($con, $sql);
			
			}
			?>
<html> 
<body>
<?php
			$coln=date("Y-m-d");
			if(isset($_GET['id'])){
				if(isset($_COOKIE['Subject'])){
				$sub=$_COOKIE['Subject'];
				$ts=$_COOKIE['ts'];
				$te=$_COOKIE['te'];
				$id=$_GET['id'];
				$q="INSERT INTO `attend`(`s_roll`,`t_id`,`sub_id`, `date`, `time_from`, `time_to`, `attended`) VALUES ('$id','7','$sub','$coln','$ts','$te','1')";
				mysqli_query($con, $q);
				echo "<meta http-equiv=refresh content=0;URL='http://192.168.4.1'/>";
				}else{echo "<meta http-equiv=refresh content=0;URL='http://192.168.4.1'/>";}
			}
			else
				echo "<meta http-equiv=refresh content=0;URL='http://192.168.4.1'/>";
			//http://localhost/project6/Esp.php?id=value*/
		?>
		
			<?php
				if(isset($_POST['logout'])){
									session_start();

					if($_SESSION['admin'])
					{	
					session_destroy();
					}
					
				$dept=$_POST['dept'];
				$teach=$_POST['teach'];
				$sub=$_POST['Subject'];
				$ts=$_POST['ts'];
				$te=$_POST['te'];

				setcookie('dept', $dept, time() - 3600);
				setcookie('teach', $teach, time() - 3600);
				setcookie('Subject', $sub, time() - 3600);
				setcookie('ts', $ts, time() - 3600);
				setcookie('te', $te, time() - 3600);
				header("Location:index.php");
			}
			?>		
		</body>
		</html>	