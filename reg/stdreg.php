<?php
	include "../php/query.php";
	$userobj= new user();
	if(isset($_POST['submit_stdreg']))
			{
				$reg=$userobj->studentreg();
				if($reg){
					header("Location: stdinfo.php?roll_no=$_POST[roll]"); 
				}else{echo "not registered";}
			}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/stdreg.css">
	</head>
	<body>
		<form method="POST">
			<div id="main_form_div">
				<div id="head_div">
					<label id="label">STUDENT REGISTRSTION</label>
				</div>
				<div id="form_div">
					<input id="roll" type="text" name="roll" placeholder="Roll No." required>
					
					<input id="name" type="text" name="name" placeholder="Name" required><br>
						
					<input id="mail" type="email" name="mail" placeholder="Email ID" required>
					
					<input id="profile" type="file" name="img" placeholder="Profile" src="image\*"><br>
					
					<input id="pass" type="password" name="pass" placeholder="Password" required><br>
					
					<input id="confirm" type="password" name="confirm" placeholder="Confirm" required><br>
					
					<select id="dial">
						<option value="+1">+1</option>
						<option value="+2">+2</option>
						<option value="+3">+3</option>
						<option value="+4">+4</option>
						<option value="+90">+90</option>
						<option value="+91" selected>+91</option>
						<option value="+114">+114</option>
					</select>
					<input id="phone" type="tel" name="phone" pattern="[0-9]{10}" placeholder="Phone"></br></br>
					
					<input id="submit_stdreg" type="submit" name="submit_stdreg" value="submit"><br><br>
					<a id="login_account" href="../login.php">Already Have an Account?</a>
				</div>
			</div>
		</form>
	</body>
</html>