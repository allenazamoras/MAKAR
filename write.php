<?php
	session_start();
	require("connectdb.php");
	
	$title = addslashes($_POST["wtitle"]);
	$content = addslashes($_POST["wcontent"]);
	
	$postin = "INSERT INTO post (post_title, post, author_id) VALUES ('$title', '$content', '".$_SESSION["user_id"]."')";
	$insert = mysqli_query($conn, $postin);
	
	$post = "SELECT * FROM post WHERE author_id='".$_SESSION["user_id"]."' AND post_id=MAX(post_id)";
	$fetch = mysqli_query($conn, $post);
	$row = mysqli_fetch_array($fetch, MYSQLI_NUM);
	$array[] = $row;
	
	echo json_encode($array);
	//if($insert){
		//return json_encode(array("success" => 1));
	//}
?>