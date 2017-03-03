<?php
	include_once "connectdb.php";
	
	$name = $_POST["name"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$udup = "SELECT username FROM users WHERE username = '$username'";
	$check1 = mysqli_query($conn, $udup);
	
	$edup = "SELECT email FROM users WHERE email = '$email'";
	$check2 = mysqli_query($conn, $edup);
	
	if(mysqli_num_rows($check1) > 0){
		echo"<script>alert('USERNAME already exist');
		             window.location.href='login.php';</script>";
	}else if(mysqli_num_rows($check2) > 0){
		echo"<script>alert('EMAIL already exist');
		             window.location.href='login.php';</script>";
	}else{
		$sql = "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
		$db = mysqli_query($conn, $sql);
		header("Location: homepage.php");
	}
?>