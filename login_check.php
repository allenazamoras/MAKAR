<?php 
	include_once "connectdb.php";
	
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	if($email != "" && $password != ""){
		$db = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	
		if(!$db){
			die("Query FAILED: ". mysqli_connect_error());
		}else{
			$row = mysqli_fetch_array($db);

			if($password == $row['password']){
				header("Location: homepage.php?");
			}else{
				header("Location: login.php");
			}
		}
	}else{
		header("Location: login.php");
	}
?>