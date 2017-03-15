<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
	}
	
	require("connectdb.php");
	
	$followee_id = $_POST["user_id"];
	
	$qfollow = "INSERT INTO followers (user_id, follower_id) VALUES ('".$followee_id."', '".$_SESSION["user_id"]."')";
	$follow = mysqli_query($conn, $qfollow);
	
	$qfollowing = mysqli_query($conn,"SELECT COUNT(follower_id) FROM followers WHERE user_id='".$followee_id."'");
    $followercount = mysqli_fetch_row($qfollowing);
    echo json_encode(($followercount[0]-1));
?>