<?php
	session_start();
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
				background-color: #fafafa;
				margin: 0px;
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
		<div id="userinfo"> <!-- user info and actions -->
			<div class="thumbnail">
				<img src="img/logo.png" alt="picture">
				<div class="caption">
					<h3 name="fname"><?php echo $_SESSION["name"];?></h3>
					<h5 name="uname" class="contri"><?php echo $_SESSION["username"];?></h5>
				</div>
				<button type="button" class="btn btn-primary h4" data-toggle="modal" data-target="#write">Write</button>
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
					include_once "connectdb.php";
					
					$posts = mysqli_query($conn, "SELECT * FROM post WHERE author_name IN (SELECT user_name FROM followers WHERE follower_name='".$_SESSION["username"]."') ORDER BY pdate DESC");
					
					if($posts->num_rows > 0){
						while($post = $posts->fetch_assoc()){
							echo '<div class="panel panel-primary">
									<div class="panel-heading"><strong>'.$post["post_title"].'</strong><small class="edit">by <a href="#" class="author">'.$post["author_name"].'</a></small></div>
										<div class="panel-body">
											<p>'.$post["post"].'</p>
											<div class="row">
												<div class="col-lg-4">
													<h5 class="contri"><span class="badge">'.$post["no_contri"].'</span> Contributors</h5>
													<button type="button" class="btn btn-default btn-lg comments">
														<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" aria-label="down"></span>
													</button>
												</div>
												
												<div class="col-lg-4 col-lg-offset-4">
													<button type="button" class="btn btn-default btn-lg edit">
														<span class="glyphicon glyphicon-star-empty" aria-hidden="true" aria-label="favourite"></span>
													</button>
													<button type="button" class="btn btn-default btn-lg edit" data-toggle="modal" data-target="#contribute">
														<span class="glyphicon glyphicon-pencil" aria-hidden="true" aria-label="pencil"></span>
													</button>
												</div>
											</div>
							
											<ul class="list-group">';
							$contri = mysqli_query($conn, "SELECT * FROM contributions WHERE post_id='".$post["post_id"]."' ORDER BY cdate ASC");
							if($contri->num_rows > 0){
								while($contrib = $contri->fetch_assoc()){
									echo'<div>
											<blockquote>
												<h5>'.$contrib["contribution"].'</h5>
												<footer><cite title="Source Title">'.$contrib["author_name"].'</cite></footer>
											</blockquote>
										</div>';
								}
							}
							echo"</ul>
								</div>
								</div>";
						}
					}
					
				?>
			</div>	
			<div id="write" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Title</h4>
							<input name="wtitle" type="text" class="form-control write" required>
						</div>
						<div class="modal-body">
							<textarea class="form-control write" rows="7"></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Post</button>
						</div>
					</div>
				</div>
			</div>
			<div id="contribute" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 name="ctitle" class="modal-title">Title (database)</h4>
						</div>
						<div class="modal-body">
							<textarea class="form-control write" rows="7"></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success" data-dismiss="modal">Add (or something)</button>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>

<script>
	$(".list-group").hide();
	$(document).ready(function(){
		$(".comments").on("click", function(){
			var x = $(this).parent().parent().parent().parent().siblings().children(".panel-body").children(".list-group"); console.log(x);
			var y = $(this).parent().parent().siblings(".list-group");
			$(x).slideUp();
			$(y).slideToggle();
			$(this).children().toggleClass("glyphicon-chevron-down");
			$(this).children().toggleClass("glyphicon-chevron-up");
			console.log($(this).attr("class"));
		});
	});
</script>
