<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("location: login.php");
	}
	
	require("connectdb.php");

	$id = $_POST["post_id"];
	
	$qfave = "DELETE FROM favourite WHERE user_id=".$_SESSION["user_id"]." and post_id=".$id;
	$fave = mysqli_query($conn, $qfave);
	
	if($fave){
		echo json_encode(1);
	}else{
		echo json_encode(0);
	}
?>