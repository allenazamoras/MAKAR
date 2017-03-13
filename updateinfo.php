<?php
	session_start();
	include_once "connectdb.php";
	$user = mysqli_query($conn, "SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'");
	$curr = mysqli_fetch_array($user);

	if($_POST["username"]!=""){
		$username = $_POST["username"];
	}else{
		$username = $curr["username"];
	}
	if($_POST["email"]!=""){
		$email = $_POST["email"];
	}else{
		$email = $curr["email"];
	}
	if($_POST["address"]!=""){
		$address = $_POST["address"];
	}else{
		$address = $curr["address"]; 
	}
	if($_POST["school"]!=""){
		$school = $_POST["school"]; 
	}else{
		$school = $curr["school"]; 
	}
	if($_POST["dob"]!=""){
		$dob = 	$_POST["dob"];
	}else{
		$dob = 	$curr["dob"];
	}
	if($_POST["about"]!=""){
		$about = $_POST["about"];
	}else{
		$about = $curr["about"];
	}

	if($_POST['newpassword']!=""){
		if($curr["password"]==$_POST['oldpassword']){
			$password = $_POST['newpassword'];
		}else{
			$password = $curr["password"];
		}
	}else{
		$password = $curr["password"];
	} 

	$query = "UPDATE users SET username='{$username}', email='{$email}', address='{$address}', school='{$school}', dob='{$dob}', about='{$about}', password='{$password}' WHERE user_id = '{$_SESSION['user_id']}'";
	$update = mysqli_query($conn, $query);

	$_SESSION["username"] = $username;

	$query = "SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'";
	$result2 = mysqli_query($conn,$query);

	while($row = mysqli_fetch_assoc($result2)){
		$set = $row;
	}

	echo json_encode($set);
?>
