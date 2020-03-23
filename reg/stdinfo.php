<?php
	include "../php/query.php";
	$userobj= new user();
	if(isset($_POST['submit_stdinfo']))
			{
				$info=$userobj->studentinfo();
				if($info){
					header("Location: ../login.php");
				}else{echo "not registered";}
			}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/stdinfo.css">
	</head>
	<body>
		<form method="POST">
			<div id="main_form_div">
				<div id="head_div">
					<label id="label">STUDENT INFORMATION</label>
				</div>
				<div id="form_div">
				<input type="hidden" name="roll_no" value="$_GET['roll_no']">
				
				<input id="fname" type="text" name="fatname" placeholder="Father Name" required>
				
				<input id="mname" type="text" name="motname" placeholder="Mother Name" required><br>
				
				<select id="gender" name="gender" required>
					<option selected hidden>Select Gender</option>
					<option value="m">Male</option>
					<option value="f">Female</option>
					<option value="o">Other</option>
				</select>
				
				<select id="branch" name="branch" required>
					<option selected hidden>Select Branch</option>
				<?php
					$obj= new db();
					$con=$obj->db_con();
					$data1=mysqli_query($con,"select branch,code from branch order by branch;");
					while ($row = $data1 -> fetch_row()) {
				?>
					<option value="<?=$row[1];?>"><?=$row[0];?></option>
				<?php } ?>
				</select>
				
				<select id="year" name="year" required>
					<option selected hidden>Select year</option>
					<option value="1" >1 Year</option>
					<option value="2">2 year</option>
					<option value="3">3 year</option>
				</select>
				
				<select id="sem" name="sem" required>
					<option selected hidden>Select Semester</option>
					<option value="1">1 Sem</option>
					<option value="2">2 Sem</option>
					<option value="3">3 Sem</option>
					<option value="4">4 Sem</option>
					<option value="5">5 Sem</option>
					<option value="6">6 Sem</option>
				</select><br>
				
				<input id="tel" type="tel" name="altphone" pattern="[0-9]{10}" placeholder="Mobile">
				
				<input id="date" type="date" name="dob" required><br>
				
				<input id="aadhar" type="text" name="aadhar" placeholder="Aadhar(optional)">	
				
				<input id="address" type="text" name="address" placeholder="Address" required><br>				
				
				<input id="submit_stdinfo" type="submit" name="submit_stdinfo" value="submit"><br><br>
			</div>
		</form>
	
	</body>

</html>