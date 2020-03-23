<?php
	include "php/query.php";
	$loginobj= new login();
	if(isset($_POST['submit_login']))
			{
				$user_login = $loginobj -> login_check();
				if($user_login)
					header('Location: head.php');
				else{echo '<script type="text/javascript">
					window.onload = function () { alert("Id or Password not match"); }
					</script>';}
			}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
		<form method="POST">
			<div id="main_form_div">				
				<div id="head_div">
					<label id="label">LOGIN</label>
				</div>
				<div id="form_div">
					<input id="roll" type="text" name="login_id" placeholder="ID"></br>
					
					<input id="pass" type="password" name="login_pass" placeholder="Password">
					
					<input id="submit_but" type="submit" name="submit_login" value="submit">
				</div>
			</div>
		</form>
	</body>
</html>