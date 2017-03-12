<?php
	session_start();
	include_once "connectdb.php";
	if($_POST["username"]!=""){
		$username = $_POST["username"];
	}else{
		$username = $_SESSION['username'];
	}
	if($_POST["email"]!=""){
		$email = $_POST["email"];
	}else{
		$email = $_SESSION['email'];
	}
	if($_POST["address"]!=""){
		$address = $_POST["address"];
	}else{
		$address = $_SESSION["address"]; 
	}
	if($_POST["school"]!=""){
		$school = $_POST["school"]; 
	}else{
		$school = $_SESSION["school"]; 
	}
	if($_POST['dob']!=""){
		$dob = 	$_POST["dob"];
	}else{
		$dob = 	$_SESSION["dob"];
	}

	$query = "UPDATE users SET username='".$username."', email='".$email."', address='".$address."', school='".$school."', dob='".$dob."' WHERE user_id = '".$_SESSION['user_id']."'"; 
	$update = mysqli_query($conn, $query);
	
	$user = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	$row = mysqli_fetch_array($user);

	$_SESSION["username"] = $row["username"]; 
	$_SESSION["email"] = $row["email"];		
	$_SESSION["address"] = $row["address"];	
	$_SESSION["school"] = $row["school"];	
	$_SESSION["dob"] = $row["dob"];			


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
