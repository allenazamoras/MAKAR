<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
	}
	
	require("connectdb.php");
	
	$id = $_POST["post_id"];
	$aid = $_POST["author_id"];
	$title = $_POST["title"];

	$qfave = "INSERT INTO favourite (user_id, post_id) VALUES ('".$_SESSION["user_id"]."', '".$id."')";
	$nfave = "INSERT INTO notify (user_id, notification) VALUES ('".$aid."', 'Someone favourited your post: ".$title."')";
	
	$fave = mysqli_query($conn, $qfave);
	$nfave = mysqli_query($conn, $nfave);
	
	if($fave && $nfave){
		echo json_encode(1);
	}else{
		echo json_encode(0);
	}
?>