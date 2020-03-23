<?php
class db{
	function db_con(){
		$conn= mysqli_connect("localhost","root","","major");
		
		if($conn){
			return $conn;
		}else{return FALSE;}
	}
}
?>