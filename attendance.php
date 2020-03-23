<?php
	session_start();
	include "php/query.php";
	$attendance_obj= new attendance();
	if(isset($_POST['submit_attendance'])){
		$attendance = $attendance_obj -> attendance_submit();
		if($attendance){
			echo '<script type="text/javascript">
					alert("Saved all records");
					</script>';
		}
		else{
			echo '<script type="text/javascript">
					window.onload = function () { alert("Something went wrong!!"); }
					</script>';
		}
		
	}
?>	
<?php
	//include("head.php");
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/attendance.css">
	</head>
	<body>
		<form method="POST">
			<div id="attendance_sheet">
				<select id="branch" name="branch" required>
					<option selected hidden>Select Branch</option>
					<?php
						$obj= new db();
						$con = $obj-> db_con();
						$data1=mysqli_query($con,"select branch,code from branch order by branch;");
						while ($row = $data1 -> fetch_row()) {
					?>
					<option value="<?=$row[1];?>"><?=$row[0];?></option>
					<?php } ?>
				</select>
			
				<select id="sem" name="sem" required>
					<option selected hidden>Select Semester</option>
					<option value="1">1 Semester</option>
					<option value="2">2 Semester</option>
					<option value="3">3 Semester</option>
					<option value="4">4 Semester</option>
					<option value="5">5 Semester</option>
					<option value="6">6 Semester</option>
				</select>
			
				<select id="lecture" name="lecture" required>
					<option selected hidden>Select Lecture</option>
					<option value="1">1 Lecture</option>
					<option value="2">2 Lecture</option>
					<option value="3">3 Lecture</option>
					<option value="4">4 Lecture</option>
					<option value="5">5 Lecture</option>
					<option value="6">6 Lecture</option>
				</select>
				<input id="search" type="submit" name="submit_class" value="SEARCH">
			</div>
		</form>
		<?php
		if(isset($_POST['submit_class']))
			{
				$student = $attendance_obj -> attendance_fetch();
				if(is_object($student)){
					echo "<form method='POST'>";
					$i=0;
					$j=-1;
					echo "<table>";
					echo "<tr>
								<th>STUDENT NAME</th>
								<th>ATTENDANCE</th>
						  </tr>";
					while($row = $student -> fetch_assoc()){
						echo "<tr><td>".$row['name']."<input type='hidden' name='$j' value='$row[roll_no]'></td>";
						echo "<td><input type = 'checkbox' name = '$i' value = 'P'></td></tr>";
						$i++;
						$j--;
					}
					echo "</table>";
					echo "<input type='hidden' name='lecture' value='$_POST[lecture]'>";
					echo "<input type='hidden' name='num' value='$i'>";
					echo "<input type='hidden' name='num2' value='$j'>";
					echo "<input id='sub' type='submit' name='submit_attendance' value='SUBMIT'>";
					echo "</form>";
				}
				else{
					echo "no students found";
				}
			}
		?>
	</body>
</html>