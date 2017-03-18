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
		<div class='container-fluid'>
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
						<h5 class="panel-title"><strong>Post of the Day</strong></h5>
					</div>
					<div class="panel-body">
						<h5>Night Vale <small>by GlowCloud</small></h5>
					</div>
				</div>
				
				<div class="panel panel-info">
					<div class="panel-heading">
						<h5 class="panel-title"><strong>Writer of the Day</strong></h5>
					</div>
					<div class="panel-body">
						<h5>Cecil Baldwin</h5>
					</div>
				</div>
				
				<div class="panel panel-info">
					<div class="panel-heading">
						<h5 class="panel-title"><strong>Most Contributed</strong></h5>
					</div>
					<div class="panel-body">
						<h5>Night Vale <small>by GlowCloud</small></h5>
					</div>
				</div>
				
				<div class="panel panel-info">
					<div class="panel-heading">
						<h5 class="panel-title"><strong>Most Favourites</strong></h5>
					</div>
					<div class="panel-body">
						<h5>Night Vale <small>by GlowCloud</small></h5>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5 col-lg-offset-3">
					<?php
						require("connectdb.php");
						
						$search = addslashes($_POST["search"]);
						$squery = "SELECT * FROM users WHERE name LIKE '%".$search."%'";
						$rows = mysqli_query($conn, $squery);
						
						if($rows->num_rows > 0){
							while($row = $rows->fetch_assoc()){
								echo"<div class='panel panel-default'>
										<a href='profile.php?id=".$row["user_id"]."' style='color:black; text-decoration:none;'>
										<div class='panel-body'>
											<div class='media'>
												<input type='hidden' value='".$row["user_id"]."'>
												<div class='media-left media-middle'>
													<img class='media-object search-img' src='img/".$row["profile_pic"]."'>
												</div>
												<div class='media-body'>
													<h4>".$row["name"]."</h4>
													<small>".$row["username"]."</small>
												</div>
											</div>
										</div>
										</a>
									</div>";
							}
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>
<script src="jq/jquery.min.js"></script>
