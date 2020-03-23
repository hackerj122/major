<?php
	session_start();
	include("../head.php");
	include("../php/query.php");
	
	$que_obj = new que_and_ans();
	
	if(isset($_POST['submit_question'])){
		$result = $que_obj -> submit_que();
		if($result){
			header("location:question.php");
		}
		else{
			echo '<script type="text/javascript">
			alert("Something went wrong");
			</script>';
		}
	}
?>
<html>
	<head> 
		<link rel="stylesheet" type="text/css" href="../css/head.css">
	</head>
	<body>
		<form method="POST">
			<h2 align="center">Ask Question</h2>
			<input type="text" name="qtitle" placeholder="Title" required></br>
			<input type="text" name="qtopic" placeholder="Topic" required></br>
			<textarea name='question' rows='10' cols='40' placeholder='your Question here..' required></textarea></br>
			<select name="ask_to" required>
				<option value="0" selected hidden>Ask to</option>
				<option value="1">Faculty only</option>
				<option value="0">All</option>
			</select>
			<input type='submit' name='submit_question' value='Submit'>
		</form>
	</body>
</html>