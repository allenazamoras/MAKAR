<?php
	require("connectdb.php");
	$deleteContribution = mysqli_query($conn,"DELETE FROM contributions WHERE post_id='{$_POST['post_id']}'");
	$deletePost = mysqli_query($conn,"DELETE FROM post WHERE post_id='{$_POST['post_id']}'");
	echo "DELETE FROM post WHERE post_id='{$_POST['post_id']}'";
?>