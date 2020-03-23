<html>
	<body>
		<h2 align="center">Query System</h2>
		<a href="ask.php"><button style="float:right">Ask Now</button></a></br>
	</body>
</html>
<?php
	include("../php/query.php");
	
	$que_obj = new que_and_ans();
	$que_obj -> fetch_que_list();
?>