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
				background-color: #fafafa;
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
				<button type="button" class="btn btn-primary h4" data-toggle="modal" data-target="#writem" id="write">Write</button>
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
					$qpost = "SELECT * FROM post WHERE author_id IN (SELECT user_id FROM followers WHERE follower_id='".$_SESSION["user_id"]."') ORDER BY pdate DESC";
					$posts = mysqli_query($conn, $qpost);
					
					if($posts->num_rows > 0){
						while($post = $posts->fetch_assoc()){
							$qpost2 = "SELECT username FROM users WHERE user_id='".$post["author_id"]."'";
							$post2 = mysqli_query($conn, $qpost2);
							$row = $post2->fetch_assoc();
							echo '<div class="panel panel-primary">
									<div class="panel-heading"><strong>'.$post["post_title"].'</strong><small class="edit">by <a href="#" class="author">'.$row["username"].'</a></small></div>
									
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
												<input type="hidden" value="'.$post["post_id"].'" >
												<button type="button" class="btn btn-default btn-lg edit">
													<span class="glyphicon glyphicon-star-empty" aria-hidden="true" aria-label="favourite"></span>
												</button>
												<button type="button" class="btn btn-default btn-lg edit add_c" data-toggle="modal" data-target="#contribute">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true" aria-label="pencil"></span>
												</button>
											</div>
										</div>
							
											<ul class="list-group">';
							$qcontri = "SELECT * FROM contributions WHERE post_id='".$post["post_id"]."' ORDER BY cdate ASC";
							$contri = mysqli_query($conn, $qcontri);
						
							if($contri->num_rows > 0){
								while($contrib = $contri->fetch_assoc()){
									$qcontri2 = "SELECT username FROM users WHERE user_id='".$contrib["author_id"]."'";
									$contri2 = mysqli_query($conn, $qcontri2);
									$fetch = $contri2->fetch_assoc();
									echo'<div>
											<blockquote>
												<h5>'.$contrib["contribution"].'</h5>
												<footer><cite title="Source Title">'.$fetch["username"].'</cite></footer>
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
			<div id="writem" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<form method="POST" action="write.php">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Title</h4>
								<input name="wtitle" type="text" class="form-control write" required>
							</div>
							<div class="modal-body">
								<textarea name="wcontent" class="form-control write" id="wcontent" rows="7"></textarea>
							</div>
							<div class="modal-footer">
								<h5 class="contri" id="wmax">170</h5>
								<button type="submit" class="btn btn-success" disabled="disabled" id="wbtn">Post</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="contribute" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 name="ctitle" id="ctitle" class="modal-title"></h4>
						</div>
						<div class="modal-body">
							<form method="POST" action="contribute.php">
								<input name="id" type="hidden" value="" id="id">
								<textarea name="content" class="form-control write" id="ccontent" rows="7"></textarea>
								<div class="modal-footer">
									<h5 class="contri" id="cmax">170</h5>
									<button type="submit" class="btn btn-success" disabled="disabled" id="cbtn">Contribute</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>
<script src="jq/jquery.min.js"></script>
<script>
	$(".list-group").hide();
	$("#cbtn").prop("disabled", false);
	$("#wbtn").prop("disabled", false);
	$(document).ready(function(){
		$(".comments").on("click", function(){
			var contribution_sibs = $(this).parent().parent().parent().parent().siblings().children(".panel-body").children(".list-group"); console.log(contribution_sibs);
			var contribution_curr = $(this).parent().parent().siblings(".list-group"); console.log(contribution_curr);

			$(contribution_sibs).slideUp();
			$(contribution_curr).slideToggle();

			var chevron_sibs = $(contribution_sibs).siblings(".row").children(".col-lg-4").children(".comments").children(); console.log(chevron_sibs);
			var chevron_curr = $(this).children(); console.log(chevron_curr);

			$(chevron_sibs).addClass("glyphicon-chevron-down");
			$(chevron_sibs).removeClass("glyphicon-chevron-up");
			$(chevron_curr).toggleClass("glyphicon-chevron-down");
			$(chevron_curr).toggleClass("glyphicon-chevron-up");
			console.log($(this).attr("class"));
		});
		
		$(".add_c").on("click", function(){
			var id = $(this).prev().prev().val();
			var title = $(this).parent().parent().parent().prev().find("strong").text();
			
			$("#contribute #ctitle").text(title);
			$("#contribute #id").val(id);
			
			$("#ccontent").keyup(function(){
				var clen = $(this).val().length;
				$("#cmax").text(170-clen);
				if(clen <= 170){
					$("#cbtn").prop("disabled", false);
				}else{
					$("#cbtn").prop("disabled", true);
				}
			});
			
		});
		
		$("#wcontent").on("click", function(){
			$(this).keyup(function(){
				var wlen = $(this).val().length;
				$("#wmax").text(170-wlen);
				if(wlen <= 170){
					$("#wbtn").prop("disabled", false);
				}else{
					$("#wbtn").prop("disabled", true);
				}
			});
		});
	});
</script>
