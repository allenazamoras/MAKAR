<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/animate.css">
		<script src="jq/jquery.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<title>Makar</title>
		<style>
			body{
				background-image: url("img/website-background.jpg"); 
				background-attachment: fixed;
				background-size: cover;
				margin: 0px;
			}
			ul{
				list-style-type: none;
			}
			li{
				text-decoration: none;
				color: black;
			}
			.nav, .navbar-form, .btn{
				display: inline-block;
			}
			.navi{
				height: 70px;
			}
			.navbar{
				min-width: 100%;
				position: fixed;
				z-index: 1;
				border-radius: 0px;
			}
			.navbar-default{
				background-color: #ffffff;
			}
			.navbar-header, #container{
				width: 100%;
				height: 50px;
			}
			.navbar-brand{
				padding-top: 10px;
				padding-left: 60px
			}
			.form-control{
				background-color: #fafafa;
				width: 300px; !important
			}
			.btn-default{
				border: 0px;
			}
			.edit{
				float: right;
			}
			.fix{
				position: fixed;
			}
			.write{
				width: 565px; !important
			}
			.featured{
				display: block;
				position: fixed;
				width: 300px;
				right: 40px;
			}
			.author{
				color: #ffffff;
			}
			.contri{
				color: gray;
			}
			.dropdown-menu {
				margin-top: 18px;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
				left: 50%;
				right: auto;
				text-align: left;
				transform: translate(-50%, 0);
			}
			.licontent{
				width: 200px;
				padding: 5px;
			}
			.glyphicon-star{
				color: rgb(0, 0, 0);
			}
			.panel-heading,.btn-primary{
		   		background-image: linear-gradient(#04519b,#044687 60%,#033769);
		  		color: #fff !important; 
		    }
			.glyphicon-remove{
				color: rgb(149, 149, 149);
			}
			.search-img{
				height: 50px;
			}
			#userinfo{
				position: fixed;
				width: 250px;
				left: 40px;
			}
			#logo{
				width: 150px;
			}
			#search{
				width: 270px;
			}
			#options{
				margin-top: 5px;
			}
			#test{
				margin-top: 1000px;
			}
			#box{
				border: 1px solid yellow;
			}
			a{
				color: black;
			}
		</style>
	</head>
	<body>
		<div class='container-fluid animated fadeIn'>
			<?php
				require("navbar.php");
			?>
			<div id="userinfo"> 
				<div class="thumbnail">
					<img src="img/logo.png" alt="picture">
					<div class="caption">
						<h3 name="fname"><?php echo $_SESSION["name"];?></h3>
						<h5 name="uname" class="contri"><?php echo $_SESSION["username"];?></h5>
					</div>
				</div>
			</div>
			
			<div class="featured">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h5 class="panel-title"><strong>Writer of the Day</strong></h5>
					</div>
					<div class="panel-body">
						<?php 
							$wodquery = mysqli_query($conn,"SELECT U.username, COUNT(P.post_id) AS postCount FROM users AS U INNER JOIN post AS P ON U.user_id = P.author_id WHERE P.pdate > DATE_SUB(NOW(), INTERVAL 1 DAY) GROUP BY U.username ORDER BY COUNT(P.post_id) DESC LIMIT 1");
							$wod = mysqli_fetch_assoc($wodquery);
							echo "<h5>".$wod['username']."</h5>";
						?>
					</div>
				</div>
			
				<div class="panel panel-info">
					<div class="panel-heading">
						<h5 class="panel-title"><strong>Most Contributed Post</strong></h5>
					</div>
					<div class="panel-body">
						<?php 
							$mostcontriquery = mysqli_query($conn,"SELECT post_title,author_id FROM post WHERE pdate > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND (SELECT MAX(no_contri) FROM post)");
							$mostcontri = mysqli_fetch_assoc($mostcontriquery);
							$authorOfPost = mysqli_query($conn,"SELECT username FROM users WHERE user_id='{$mostcontri['author_id']}'");
							$author = mysqli_fetch_assoc($authorOfPost);
							echo "<h5>".$mostcontri['post_title']." <small>by ".$author['username']."</small></h5>";
						?>
					</div>
				</div>
			
				<div class="panel panel-info">
					<div class="panel-heading">
						<h5 class="panel-title"><strong>Most Favourited Post</strong></h5>
					</div>
					<div class="panel-body">
						<?php 
							$mostfavepostquery = mysqli_query($conn,"SELECT post_id,COUNT(post_id) AS favs FROM favourite GROUP BY post_id ORDER BY favs DESC LIMIT 1");
							$mostfavepost = mysqli_fetch_assoc($mostfavepostquery);
							$mostfavequery = mysqli_query($conn,"SELECT post_title,author_id FROM post WHERE pdate > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND post_id='{$mostfavepost['post_id']}'");
							$mostfave = mysqli_fetch_assoc($mostfavequery);
							$authorOfPost = mysqli_query($conn,"SELECT username FROM users WHERE user_id='{$mostfave['author_id']}'");
							$author = mysqli_fetch_assoc($authorOfPost);
							echo "<h5>".$mostfave['post_title']." <small>by ".$author['username']."</small></h5>";
						?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5 col-lg-offset-3">
					<?php
						require("connectdb.php");
						
						$search = addslashes($_POST["search"]);
						$snamequery = "SELECT * FROM users WHERE name LIKE '%".$search."%'";
						$susernamequery = "SELECT * FROM users WHERE username LIKE '%".$search."%'";
						$nrows = mysqli_query($conn, $snamequery);
						$urows = mysqli_query($conn, $susernamequery);
						echo "<div class='panel panel-default'><div class='panel-body'><b>search by name</b></div></div>";
						
						if($nrows->num_rows > 0){
							
							while($nrow = $nrows->fetch_assoc()){
								echo"<div class='panel panel-default'>
										<a href='profile.php?id=".$nrow["user_id"]."' style='color:black; text-decoration:none;'>
										<div class='panel-body'>
											<div class='media'>
												<input type='hidden' value='".$nrow["user_id"]."'>
												<div class='media-left media-middle'>
													<img class='media-object search-img' src='img/";
								if($nrow["profile_pic"]!=""){
									echo $nrow["profile_pic"];
								}else{
									echo "default.png";
								}

								echo "'>
												</div>
												<div class='media-body'>
													<h4>".$nrow["name"]."</h4>
													<small>".$nrow["username"]."</small>
												</div>
											</div>
										</div>
										</a>
									</div>";
							}
						}else{
							echo "<div class='panel panel-default'><div class='panel-body'><h3><b>We've Come Up Empty..</b></h3></div></div>";
						}
						echo "<div class='panel panel-default'><div class='panel-body'><b>search by username</b></div></div>";
						if($urows->num_rows > 0){
							while($urow = $urows->fetch_assoc()){
								echo"<div class='panel panel-default'>
										<a href='profile.php?id=".$urow["user_id"]."' style='color:black; text-decoration:none;'>
										<div class='panel-body'>
											<div class='media'>
												<input type='hidden' value='".$urow["user_id"]."'>
												<div class='media-left media-middle'>
													<img class='media-object search-img' src='img/";
								if($urow["profile_pic"]!=""){
									echo $urow["profile_pic"];
								}else{
									echo "default.png";
								}

								echo "'>
												</div>
												<div class='media-body'>
													<h4>".$urow["name"]."</h4>
													<small>".$urow["username"]."</small>
												</div>
											</div>
										</div>
										</a>
									</div>";
							}
						}else{
							echo "<div class='panel panel-default'><div class='panel-body'><h3><b>We've Come Up Empty..</b></h3></div></div>";
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>
<script src="jq/jquery.min.js"></script>
