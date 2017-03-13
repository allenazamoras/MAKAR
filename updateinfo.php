<?php
	session_start();
	include_once "connectdb.php";
	$user = mysqli_query($conn, "SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'");
	$curr = mysqli_fetch_array($user);

	if($_POST["username"]!=""){
		$username = $_POST["username"];
	}else{
		$username = $curr['username'];
	}
	if($_POST["email"]!=""){
		$email = $_POST["email"];
	}else{
		$email = $curr['email'];
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
	if($_POST['dob']!=""){
		$dob = 	$_POST["dob"];
	}else{
		$dob = 	$curr["dob"];
	}

	$query = "UPDATE users SET username='{$username}', email='{$email}', address='{$address}', school='{$school}', dob='{$dob}' WHERE user_id = '{$_SESSION['user_id']}'";
	$update = mysqli_query($conn, $query);

	$_SESSION["username"] = $username;

	$query = "SELECT * FROM users WHERE user_id='".$_SESSION['user_id']."'";
	$result2 = mysqli_query($conn,$query);

	while($row = mysqli_fetch_assoc($result2)){
		$set = $row;
	}

	echo json_encode($set);
	// $newpassword = $_POST['newpassword'];
	// $oldpassword = $_POST['oldpassword'];

	
	// $passquery = "SELECT password FROM users WHERE username='{$_SESSION['username']}'";
	// $resultpass = mysqli_query($conn,$passquery);
	// if($row = mysqli_fetch_assoc($resultpass)){
	// 	if($row['password']==$oldpassword){
	// 		$password = $newpassword;
	// 	}else{
	// 		$password = $row['password'];
	// 		echo"<script>alert('PASSWORD does not match');</script>";
	// 	}
	// }else{
	// 	echo "<script>alert('error: query failed');</script>";
	// }

	// // //$password;

	// $udup = "SELECT username FROM users WHERE username = '$username'";
	// $check1 = mysqli_query($conn, $udup);
	
	// $edup = "SELECT email FROM users WHERE email = '$email'";
	// $check2 = mysqli_query($conn, $edup);

	// $query = "UPDATE users SET username='".$username."', email='".$email."', address='".$address."', school='".$school."', dob='".$dob."', password='".$password."' WHERE user_id = '$username'";
	
	// //window.location.href='profile.php';
	// if(mysqli_num_rows($check1) > 0){
	// 	echo"<script>alert('USERNAME already exist');</script>";
	// }else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
	// 	echo"<script>alert('EMAIL is not valid');</script>";
	// }else if(mysqli_num_rows($check2) > 0){
	// 	echo"<script>alert('EMAIL already exist');</script>";
	// }else{
	// }
?>
