<?php
	session_start();
	require("connectdb.php");
	
	$title = addslashes($_POST["wtitle"]);
	$content = addslashes($_POST["wcontent"]);
	
	$postin = "INSERT INTO post (post_title, post, author_id) VALUES ('$title', '$content', '".$_SESSION["user_id"]."')";
	$insert = mysqli_query($conn, $postin);
	
	if($insert){
		header("Location: homepage.php");
	}
?>