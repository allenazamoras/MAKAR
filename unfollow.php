<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("location: login.php");
	}
	
	require("connectdb.php");

	$followee_id = $_POST["user_id"];
	
	$qunfollow = "DELETE FROM followers WHERE user_id=".$followee_id." and follower_id=".$_SESSION["user_id"];
	$unfollow = mysqli_query($conn, $qunfollow);
	
	$qfollowing = mysqli_query($conn,"SELECT COUNT(follower_id) FROM followers WHERE user_id='".$followee_id."'");
    $followercount = mysqli_fetch_row($qfollowing);
    echo json_encode(($followercount[0]-1));
?>