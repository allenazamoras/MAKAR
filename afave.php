<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
	}
	
	require("connectdb.php");
	
	$id = $_POST["post_id"];
	
	$qfave = "INSERT INTO favourite (user_id, post_id) VALUES ('".$_SESSION["user_id"]."', '".$id."')";
	$fave = mysqli_query($conn, $qfave);
	
	if($fave){
		echo json_encode(1);
	}else{
		echo json_encode(0);
	}
?>