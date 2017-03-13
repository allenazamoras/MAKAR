<?php 
	require("connectdb.php");
	
	$email = addslashes($_POST["email"]);
	$password = addslashes($_POST["password"]);
	
	$user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	
	if(!$user){
		die("Query FAILED: ". mysqli_connect_error());
	}else{
		$row = mysqli_fetch_array($user);

		if($password == $row['password']){
			session_start();
			$_SESSION["user_id"] = $row["user_id"];
			$_SESSION["name"] = $row["name"];
			$_SESSION["username"] = $row["username"];
			
			header("Location: homepage.php?id=".$_SESSION["user_id"]);
		}else{
			header("Location: login.php?");
		}
	}
	
?>
