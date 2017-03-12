<?php 
	session_start();
	require("connectdb.php");
	move_uploaded_file($_FILES['file']['tmp_name'],"img/".$_FILES['file']['name']);
	$q = mysqli_query($conn,"UPDATE users SET profile_pic = '".$_FILES['file']['name']."' WHERE user_id = '".$_SESSION['user_id']."'");


	$profpicquery = "SELECT profile_pic FROM users WHERE user_id='".$_SESSION['user_id']."'";
	$result = mysqli_query($conn,$profpicquery);

	while($row = mysqli_fetch_assoc($result)){
		$set = $row;
	}

	echo json_encode($set);
	header("Location: profile.php")
?>