<?php
	session_start();
	require("connectdb.php");
	
	$id = $_POST["id"];
	$content = $_POST["content"];
	$aid = $_POST["aid"];
	
	$fetcht = "SELECT post_title FROM post WHERE post_id='".$id."'";
	$titleq = mysqli_query($conn, $fetcht);
	$title = mysqli_fetch_array($titleq, MYSQLI_NUM);
	
	$contriin = "INSERT INTO contributions (post_id, contribution, author_id) VALUES ('$id', '$content', '".$_SESSION["user_id"]."')";
	$contriup = "UPDATE post SET no_contri = no_contri + 1 WHERE post_id = '$id'";
	$notif = "INSERT INTO notify (user_id, notification) VALUES ('".$aid."', 'Someone contributed to your post: ".$title[0]."')";
	
	$insert = mysqli_query($conn, $contriin);
	$update = mysqli_query($conn, $contriup);
	$notify = mysqli_query($conn, $notif);
	
	if($insert && update){
		header("location: homepage.php");
	}else{
		echo"<script>alert('ERROR');</script>";
	}
?>