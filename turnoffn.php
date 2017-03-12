<?php
	require("connectdb.php");
	
	$notif = "UPDATE notify SET nread = '1' WHERE user_id='".$_SESSION["user_id"]."' and nread='0'";
	$changen = mysqli_query($conn, $notif);
?>