<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("location: login.php");
	}
	
	require("connectdb.php");

	$id = $_POST["post_id"];
	
	$qfave = "DELETE FROM favourite WHERE user_id=".$_SESSION["user_id"]." and post_id=".$id;
	$fave = mysqli_query($conn, $qfave);
	
	$favouritequery = mysqli_query($conn,"SELECT COUNT(post_id) FROM favourite WHERE user_id='{$_POST['user_id']}'");
    $favouritecount = mysqli_fetch_row($favouritequery);
   	echo ($favouritecount[0]);
?>
