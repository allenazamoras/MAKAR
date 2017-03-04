<?php 
	include_once "connectdb.php";
	
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	
	if(!$user){
		die("Query FAILED: ". mysqli_connect_error());
	}else{
		$row = mysqli_fetch_array($user);

		if($password == $row['password']){
			session_start();
			
			$_SESSION["name"] = $row["name"];
			$_SESSION["username"] = $row["username"];
			$_SESSION["no_followers"] = $row["no_followers"];
			$_SESSION["phone_no"] = $row["phone_no"];
			$_SESSION["address"] = $row["address"];
			$_SESSION["school"] = $row["school"];
			$_SESSION["dob"] = $row["dob"];
			
			header("Location: homepage.php?");
		}else{
			header("Location: login.php?");
		}
	}
	
?>