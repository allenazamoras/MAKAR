<?php
	include_once "connectdb.php";
	
	$name = $_POST["name"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$password2 = $_POST["password2"];
	
	$udup = "SELECT username FROM users WHERE username = '$username'";
	$check1 = mysqli_query($conn, $udup);
	
	$edup = "SELECT email FROM users WHERE email = '$email'";
	$check2 = mysqli_query($conn, $edup);

	if(mysqli_num_rows($check1) > 0){
		echo"<script>alert('USERNAME already exist');
		             window.location.href='login.php';</script>";
	}else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
		echo"<script>alert('EMAIL is not valid');
		             window.location.href='login.php';</script>";
	}else if(mysqli_num_rows($check2) > 0){
		echo"<script>alert('EMAIL already exist');
					 window.location.href='login.php';</script>";
	}else{
		if($password == $password2){
			$sql = "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
			$db = mysqli_query($conn, $sql);
			
			session_start();
			$user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
			$row = mysqli_fetch_array($user);
			$_SESSION["user_id"] = $row["user_id"];
			$_SESSION["name"] = $row["name"];
			$_SESSION["username"] = $row["username"];
			$_SESSION["no_followers"] = $row["no_followers"];
			$_SESSION["phone_no"] = $row["phone_no"];
			$_SESSION["address"] = $row["address"];
			$_SESSION["school"] = $row["school"];
			$_SESSION["dob"] = $row["dob"];
			
			$sql2 = "INSERT INTO followers (user_id, follower_id) VALUES ('".$_SESSION["user_id"]."', '".$_SESSION["user_id"]."')";
			$db2 = mysqli_query($conn, $sql2); 
			
			header("Location: homepage.php");
		}else{
			echo"<script>alert('PASSWORD does not match');
			             window.location.href='login.php';</script>";
		}
	}
?>