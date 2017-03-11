<?php
	require("connectdb.php");

	$search = $_POST["search"];
	$qry = "SELECT user_id, username, name, profile_pic FROM users WHERE name LIKE '%".$search."%'";
	$sql = mysqli_query($conn, $qry);

	$rows = mysqli_fetch_array($sql, MYSQLI_ASSOC);
	if($rows == false){
		echo json_encode(0);
	}else{
		echo json_encode($rows);
	}
?>