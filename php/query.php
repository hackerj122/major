<?php
include("db_con.php");

class user{
	function studentreg(){
		$obj2= new db();
        $con=$obj2->db_con();
		
		$name=$_POST['name'];
		$roll=$_POST['roll'];
		$pass = md5($_POST['pass']);
		$img=$_POST['img'];
		$mail=strtolower($_POST['mail']);
		$phone=$_POST['phone'];
		 
		if($img == NULL){
			$img = "image/profile.jpg";
		} 
		 
		$query="INSERT INTO stdreg(sno,roll,name,img,pass,phone,mail,status)
		VALUES('','$roll','$name','$img','$pass','$phone','$mail','A')";
		$data=mysqli_query($con,$query);
		
		if($data)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function studentinfo(){
		$obj2= new db();
        $con=$obj2->db_con();
		
		$roll_no=$_POST['roll_no'];
		$fatname=$_POST['fatname'];
		$motname=$_POST['motname'];
		$gender=$_POST['gender'];
		$branch=$_POST['branch'];
		$year=$_POST['year'];
		$sem=$_POST['sem'];
		$altphone=$_POST['altphone'];
		$dob=$_POST['dob'];
		$aadhar=$_POST['aadhar'];
		$address=$_POST['address'];
		
		$query="INSERT INTO stdinfo(roll_no,fatname,motname,gender,branch,year,sem,altphone,dob,aadhar,address) 
		VALUES('$roll_no','$fatname','$motname','$gender','$branch','$year','$sem','$altphone','$dob','$aadhar','$address')";
		$data=mysqli_query($con,$query);
		
		if($data)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function facultyreg(){
		$obj2= new db();
        $con=$obj2->db_con();
		
		$name=$_POST['name'];
		$img=$_POST['img'];
		$mobile=$_POST['mobile'];
		$email=strtolower($_POST['email']);
		$pass = md5($_POST['pass']);
		$branch=$_POST['branch'];
		$qualify=$_POST['qualify'];
		$post=$_POST['post'];
		$address=$_POST['address'];
		
		$query="INSERT INTO facreg(sno,name,img,mobile,email,pass,branch,qualify,post,address) 
		VALUES('','$name','$img','$mobile','$email','$pass','$branch','$qualify','$post','$address')";
		$data=mysqli_query($con,$query);
		
		if($data)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

class login{
	function login_check(){
		$loginobj= new db();
        $con = $loginobj -> db_con();
		
		$login_id = strtolower($_POST['login_id']);
		$login_pass = md5($_POST['login_pass']);
		
		$query = "select pass from stdreg where roll = '$login_id';";
		$result=mysqli_query($con,$query);
		$check_pass = $result -> fetch_row();
		
		if(empty($check_pass[0])){
			$query = "select pass, sno from facreg where email = '$login_id' order by pass;";
			$result=mysqli_query($con,$query);
			$check_pass = $result -> fetch_row();
			
			if(empty($check_pass[0])){
				echo '<script type="text/javascript">
				window.onload = function () { alert("Id or Password not match"); }
				</script>';
			}
			else{
				
				if(!strcmp($check_pass[0],$login_pass)){
					session_start();
					$_SESSION['user_level'] = "3";
					$_SESSION['user_id'] = $check_pass[1];
					return TRUE;
				}
				else{
					return FALSE;
				}
			}
		}
		else{
			if(!strcmp($check_pass[0],$login_pass)){
				session_start();
				$_SESSION['user_level'] = "4";
				$_SESSION['user_id'] = $login_id;
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	}
}

class attendance{
	function attendance_fetch(){
		$obj2 = new db();
        $con = $obj2 -> db_con();
		
		$branch=$_POST['branch'];
		$sem=$_POST['sem'];
		
		$query="SELECT stdinfo.roll_no, stdreg.name from stdinfo
				INNER JOIN stdreg
				ON
				stdinfo.roll_no = stdreg.roll
				WHERE stdinfo.branch = '$branch' and stdinfo.sem = '$sem'";
		$data = mysqli_query($con,$query);
		
		
		
		if($data)
		{
			return $data;
		}
		else
		{
			return FALSE;
		}
	}
	
	function attendance_submit(){
		$obj2 = new db();
        $con = $obj2 -> db_con();
		
		$lecture = $_POST['lecture'];
		$attendance_date = date('Y-m-d');
		$attendance_status = array(
			"foo" => "bar",
			"bar" => "foo",
		);
		$student_id = array(
			"foo" => "bar",
			"bar" => "foo",
		);
		
		$i=$_POST['num'];
		$j=$_POST['num2'];
		for($x=0; $x < $i; $x++){
			if(!empty($_POST[$x])){
				$attendance_status[$x] = "P";
			}
			else{
				$attendance_status[$x] = "A";
			}
		}
		for($y=-1,$a=0; $y > $j; $y--){
			$student_id[$a] = "$_POST[$y]";
			$a++;
		}
		
		$query="select * from attendance";
		$attendance = mysqli_query($con,$query);
		$insert;
				
		if($attendance -> num_rows > 0){
			while($row = $attendance -> fetch_assoc()){
				if(!strcmp($row['student_id'],$student_id[0]) &&
				!strcmp($row['attendance_date'],$attendance_date) &&
				!strcmp($row['faculty_id'],$_SESSION['user_id']) &&
				!strcmp($row['lecture'],$lecture)){
					$insert = FALSE;
					break(1);
				}
				else{
					$insert = TRUE;
					break(1);
				}
			}
		}
		else{
			for($m=0; $m < $i; $m++){
				$insert=TRUE;
				break(1);
			}
		}
		if($insert){
			for($counter=0; $counter < $i; $counter++){
				$query="INSERT INTO attendance(attendance_id, student_id, attendance_status, attendance_date, faculty_id,lecture)
					VALUES('','$student_id[$counter]','$attendance_status[$counter]','$attendance_date','$_SESSION[user_id]','$lecture')";
					$result = mysqli_query($con,$query);
			}
		}
		else{
			for($counter=0; $counter < $i; $counter++){
				$query="UPDATE attendance SET 
						attendance_status = '$attendance_status[$counter]'
						where attendance_id = 
								(SELECT attendance_id FROM attendance WHERE 
								student_id= '$student_id[$counter]' and 
								attendance_date= '$attendance_date' and 
							faculty_id= '$_SESSION[user_id]' and lecture='$lecture')";
					$result = mysqli_query($con,$query);
			}
		}
		if($result)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

class printpdf{
	function studentrecord(){
		require("tcpdf/tcpdf.php");
		
		$obj2 = new db();
		$con = $obj2 -> db_con();
		
		$branch=$_POST['branch'];
		$sem=$_POST['sem'];
		
		$query="SELECT stdinfo.roll_no, stdinfo.address, stdreg.name, stdreg.phone, stdreg.mail 
					from stdinfo
					INNER JOIN stdreg
					ON
					stdinfo.roll_no = stdreg.roll
					WHERE stdinfo.branch = '$branch' and stdinfo.sem = '$sem'";
		$result = mysqli_query($con,$query);
		
		if($result){
			while($row = $result -> fetch_assoc()){
				$record = '
					<tr>
						<td>'.$row["roll_no"].'</td>
						<td>'.$row["name"].'</td>
						<td>'.$row["phone"].'</td>
						<td>'.$row["mail"].'</td>
						<td>'.$row["address"].'</td>
					</tr>
				';
			}
			return $result;
		}
		else{
			return FALSE;
		}
	}
	function generatepdf($record){
		$pdf = new TCPDF();
		$pdf -> AddPage();
		$pdf -> SetFont('','','10');
		$pdf -> Ln();
		$pdf -> Ln();
		$pdf -> SetFont('','','10');
		$pdf -> cell(10,7,"Sno");
		$pdf -> cell(25,7,"Roll");
		$pdf -> cell(30,7,"Name");
		$pdf -> cell(30,7,"Phone");
		$pdf -> cell(45,7,"E-mail");
		$pdf -> cell(40,7,"Address");
		$pdf -> Ln();
		$pdf -> Ln();
		
		$printthis = $record;
		$printthis .= '</table>';
		$pdf -> writeHTML($printthis);
		
		$i=1;
		while($i==3){
			$pdf -> cell(10,7,"$i");
			$pdf -> cell(25,7,"$record[roll_no]");
			$pdf -> cell(30,7,"$record[name]");
			$pdf -> cell(30,7,"$record[phone]");
			$pdf -> cell(45,7,"$record[mail]");
			$pdf -> cell(40,7,"$record[address]");
			$pdf -> Ln();
			$i++;
		}
		$pdf -> output();
		}
}

class que_and_ans{
	function fetch_que_list(){
		$obj2= new db();
		$con=$obj2->db_con();
		
		$query = "select * from query_que";
		$all_que = mysqli_query($con,$query);
				
		if($all_que -> num_rows > 0){
			while($row = $all_que -> fetch_assoc()){
				echo "<a href='q&a.php?qid=$row[que_id]'>$row[qtitle]</a><br>";
			}
		}
	}
	
	function fetch_que($qid){
		$obj2= new db();
		$con=$obj2->db_con();
		
		$query = "select * from query_que where que_id = $qid;";
		$que = mysqli_query($con,$query);
		$question = $que -> fetch_row();
		
		if(!strcmp($question[4],'3')){
			$query = "select name from facreg where sno = '$question[5]'";
			$result = mysqli_query($con,$query);
			$name = $result -> fetch_row();
		}
		else if(!strcmp($question[4],'4')){
			$query = "select name from stdreg where roll = '$question[5]'";
			$result = mysqli_query($con,$query);
			$name = $result -> fetch_row();
		}
		
		echo "<h2 align='center'>Query System</h2>
			<h4 align='right'>$name[0]</h4>
			<h4 align='right'>$question[6]</h4>
			Question:
			<p>$question[2]</p><hr>
			<pre>$question[3]</pre><hr>
		";
		
		$query = "select * from query_ans where que_id = $question[0];";
		$ans = mysqli_query($con,$query);
		
		echo "Answers:<hr>";
		
		if($ans -> num_rows > 0){
			while($row = $ans -> fetch_assoc()){
				if(!strcmp($row['answerer_type'],'3'))
					$query = "select name from facreg where sno = '$row[answerer]'";
				else if(!strcmp($row['answerer_type'],'4'))
					$query = "select name from stdreg where roll = '$row[answerer]'";
				
				$result = mysqli_query($con,$query);
				$answerer_name = $result -> fetch_row();
					
				echo "<h6>$answerer_name[0] $row[time]</h6>
				<pre>$row[ans_desc]</pre><hr>";
			}
		}
	}
	
	function submit_que(){
		$obj2= new db();
        $con=$obj2->db_con();
		
		$qtitle = $_POST['qtitle'];
		$qtopic = $_POST['qtopic'];
		$question = $_POST['question'];
		$ask_to = $_POST['ask_to'];
		
		date_default_timezone_set('Asia/Kolkata');
		$time = date('Y-m-d H:i:s');
		$asker_type = $_SESSION['user_level'];
		$asker = $_SESSION['user_id'];
		
		$query="INSERT INTO query_que(que_id, qtopic, qtitle, qdesc, asker_type, asker, time, ask_to)
		VALUES('','$qtopic','$qtitle','$question','$asker_type','$asker','$time','$ask_to')";
		$data=mysqli_query($con,$query);
		
		if($data)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function submit_ans($qid){
		$obj2= new db();
        $con=$obj2->db_con();
		
		$answer = $_POST['answer'];
		date_default_timezone_set('Asia/Kolkata');
		$time = date('Y-m-d H:i:s');
		$answerer_type = $_SESSION['user_level'];
		$answerer = $_SESSION['user_id'];
		
		$query="INSERT INTO query_ans(ans_id, que_id, ans_desc, answerer_type, answerer, time)
		VALUES('','$qid','$answer','$answerer_type','$answerer','$time')";
		$data=mysqli_query($con,$query);
		
		if($data)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
?>