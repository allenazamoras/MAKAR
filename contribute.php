<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
	}
	require("connectdb.php");
	
	$id = $_POST["post_id"];
	$content = addslashes($_POST["contribution"]);
	$aid = $_POST["author_id"];
	
	$fetcht = "SELECT post_title FROM post WHERE post_id='".$id."'";
	$titleq = mysqli_query($conn, $fetcht);
	$title = mysqli_fetch_array($titleq, MYSQLI_NUM);
	
	$contriin = "INSERT INTO contributions (post_id, contribution, author_id) VALUES ('$id', '$content', '".$_SESSION["user_id"]."')";
	$contriup = "UPDATE post SET no_contri = no_contri + 1 WHERE post_id = '$id'";
	$notif = "INSERT INTO notify (user_id, notification) VALUES ('".$aid."', 'Someone contributed to your post: ".$title[0]."')";
	
	$insert = mysqli_query($conn, $contriin);
	$update = mysqli_query($conn, $contriup);
	$notify = mysqli_query($conn, $notif);
	
	$contri = "SELECT * FROM contributions WHERE contribution_id=(SELECT MAX(contribution_id) FROM contributions WHERE author_id='".$_SESSION["user_id"]."')";
	$fetch = mysqli_query($conn, $contri);
	$array = mysqli_fetch_assoc($fetch);
	
	if($array){
		echo json_encode($array);
	}else{
		echo json_encode(0);
	}
?>