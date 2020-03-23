<?php
	session_start();
	include("../php/query.php");
	
	$qid = $_GET['qid'];
	
	$que_obj = new que_and_ans();
	$que_obj -> fetch_que($qid);
	
	if(isset($_POST['submit_answer'])){
		$result = $que_obj -> submit_ans($qid);
		if($result){
			header("location:q&a.php?qid=$qid");
		}
		else{
			echo '<script type="text/javascript">
			alert("Something went wrong");
			</script>';
		}
	}
?>
<html>
	<body>
		<form method='POST'>
			<textarea name='answer' rows='10' cols='40' placeholder='your answer here..' required></textarea></br>
			<input type='submit' name='submit_answer' value='Submit'>
		</form>
	</body>
</html>