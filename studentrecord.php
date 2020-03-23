<?php
	session_start();
	include "php/query.php";
	$pdf = new printpdf();
	if(isset($_POST['print'])){
		$record = $pdf -> studentrecord();
		$printpdf = $pdf -> generatepdf($record);
	}
?>
<html>
	<body>
		<h2>Student Record</h1>
		<form method="POST">
			<select name="branch" required>
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
			
			<select name="sem" required>
				<option selected hidden>Select Semester</option>
				<option value="1">1 Sem</option>
				<option value="2">2 Sem</option>
				<option value="3">3 Sem</option>
				<option value="4">4 Sem</option>
				<option value="5">5 Sem</option>
				<option value="6">6 Sem</option>
			</select>
			
			<input type="submit" name="print" value="Print">
		</form>
	</body>
</html>