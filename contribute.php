<?php
	session_start();
	require("connectdb.php");
	
	$id = $_POST["id"];
	$content = $_POST["content"];
	
	$contriin = "INSERT INTO contributions (post_id, contribution, author_id) VALUES ('$id', '$content', '".$_SESSION['user_id']."')";
	$contriup = "UPDATE post SET no_contri = no_contri + 1 WHERE post_id = '$id'";
	
	$insert = mysqli_query($conn, $contriin);
	$update = mysqli_query($conn, $contriup);
	
	if($insert && update){
		header("location: homepage.php");
	}else{
		echo"<script>alert('ERROR');</script>";
	}
?>