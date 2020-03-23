<?php
	include "../php/query.php";
	$userobj= new user();
	if(isset($_POST['submit']))
			{
				$facinfo=$userobj->facultyreg();
				if($facinfo){
					echo "registered";
					header("Location: ../login.php"); 
				}else{echo "not registered";}
			}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/factreg.css">
	</head>
	<body>
		<form method="POST">
			<div id="main_form_div">
				<div id="head_div">
					<label id="label">FACULTY REGISTRSTION</label>
				</div>
				<div id="form_div">
					<input id="name" type="text" name="name" value="" placeholder="Name">
						
					<input id="profile" type="file" name="img" src="image\*"><br>
					
					<input id="mail" type="email" name="email" value=""  placeholder="Email" required>
						
					<select id="post" name="post">
						<option selected hidden >Select Post</option>
						<option value="guest faculty">Guest faculty</option>
						<option value="senior guest">Senior guest</option>
						<option value="permanent faculty">Permanent faculty</option>
					</select><br>
					
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
					
					<input id="phone" type="tel" name="mobile" value="" pattern="[0-9]{10}" placeholder="Mobile" required><br>
						
					<input id="pass" type="password" name="pass" value=""  placeholder="Password" required >
					
					<input id="confirm" type="password" name="pass" value=""  placeholder="Confirm" required ><br>
					
					<input id="qualify" type="text" name="qualify" value=""  placeholder="Qualification" required>
					
					<input id="address" type="text" name="address" value=""  placeholder="Address" required ><br>
						
					<input id="fact_reg_submit" type="submit" name="submit" value="Register" required ><br>	
				
					<a id="login_account" href="../login.php">Already Have an Account?</a>
				</div>
			</div>
		</form>
	</body>
	
</html>