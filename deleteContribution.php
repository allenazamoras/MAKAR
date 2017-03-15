<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
	}
	require("connectdb.php");
	
	$contrid = $_POST["contr_id"];
	$postid = $_POST["post_id"];
	
	$deletecq = "DELETE FROM contributions WHERE contribution_id='".$contrid."'";
	$contri_no = "UPDATE post SET no_contri = no_contri - 1 WHERE post_id='".$postid."'";
	
	$delete = mysqli_query($conn, $deletecq);
	$update = mysqli_query($conn, $contri_no);
	
	$n = "SELECT no_contri FROM post WHERE post_id='".$postid."'";
	$fetch = mysqli_query($conn, $n);
	$ret = mysqli_fetch_row($fetch);
	
	echo $ret[0];
?>