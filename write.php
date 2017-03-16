<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
	}
	require("connectdb.php");
	
	$title = addslashes($_POST["wtitle"]);
	$content = addslashes($_POST["wcontent"]);
	
	$postin = "INSERT INTO post (post_title, post, author_id) VALUES ('$title', '$content', '".$_SESSION["user_id"]."')";
	$insert = mysqli_query($conn, $postin);
	
	$post = "SELECT * FROM post WHERE post_id=(SELECT MAX(post_id) FROM post WHERE author_id='".$_SESSION["user_id"]."')";
	$fetch = mysqli_query($conn, $post);
	$array = mysqli_fetch_assoc($fetch);
	
	if($array){
		echo json_encode($array);
	}
	//if($insert){
		//return json_encode(array("success" => 1));
	//}
?>