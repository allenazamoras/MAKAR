<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
	}
	require("connectdb.php");
	$deleteContribution = mysqli_query($conn,"DELETE FROM contributions WHERE post_id='{$_POST['post_id']}'");
	$deletePost = mysqli_query($conn,"DELETE FROM post WHERE post_id='{$_POST['post_id']}'");
	
	$postquery = mysqli_query($conn,"SELECT COUNT(post_id) FROM post WHERE author_id='{$_POST['user_id']}'");
    $postcount = mysqli_fetch_row($postquery);
    echo $postcount[0];
?>
