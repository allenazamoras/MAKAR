<?php
	session_start();
	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
	}
	
	require("connectdb.php");
	
	$id = $_POST["post_id"];
	
	$qfave = "INSERT INTO favourite (user_id, post_id) VALUES ('".$_SESSION["user_id"]."', '".$id."')";
	$fave = mysqli_query($conn, $qfave);

   	$userpostsquery = mysqli_query($conn,"SELECT post_id FROM post WHERE author_id='{$_POST['user_id']}'");
    $totalfaves = 0;
    while($userposts = mysqli_fetch_assoc($userpostsquery)){
      $favequery = mysqli_query($conn,"SELECT COUNT(post_id) AS faves FROM favourite WHERE post_id='{$userposts['post_id']}'");
      $fave = mysqli_fetch_assoc($favequery);
      $totalfaves += $fave['faves'];
    }
    echo $totalfaves;
?>
