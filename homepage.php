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
		</div><!-- /.featured -->
		<div class="row">
			<div class="col-lg-5 col-lg-offset-3 posts">
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
									<div class="panel-heading"><strong>'.$post["post_title"].'</strong><small class="edit">by '.$row["username"].'</small></div>
									<input type="hidden" value="'.$post["author_id"].'">
									<div class="panel-body">
										<p>'.$post["post"].'</p>
										<div class="row">
											<div class="col-lg-4 expand">
												<h5 class="contri"><span class="badge">'.$post["no_contri"].'</span> Contributors</h5>
												<button type="button" class="btn btn-default btn-lg comments">
													<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" aria-label="down"></span>
												</button>
											</div>
												
											<div class="col-lg-4 col-lg-offset-4 es">
												<input type="hidden" value="'.$post["post_id"].'">
												<button type="button" class="btn btn-default btn-lg edit favourite">
													<span class="glyphicon glyphicon glyphicon-star" aria-hidden="true" aria-label="favourite" id="i'.$post["post_id"].'"></span>
												</button>
												<button type="button" class="btn btn-default btn-lg edit add_c" data-toggle="modal" data-target="#contribute">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true" aria-label="pencil"></span>
												</button>
											</div>
										</div>
							
										<ul class="list-group">';
											
							$qfave = "SELECT * FROM favourite WHERE user_id='".$_SESSION["user_id"]."' and post_id='".$post["post_id"]."'";
							$fave = mysqli_query($conn, $qfave);
				
							if($fave->num_rows > 0){
								$x = $post["post_id"];
								echo '<style>span[id=i'.$post["post_id"].']{color: rgb(255, 204, 70);}</style>';	
							}
			
							$qcontri = "SELECT * FROM contributions WHERE post_id='".$post["post_id"]."' ORDER BY cdate ASC";
							$contri = mysqli_query($conn, $qcontri);
						
							if($contri->num_rows > 0){
								while($contrib = $contri->fetch_assoc()){
									$qcontri2 = "SELECT username FROM users WHERE user_id='".$contrib["author_id"]."'";
									$contri2 = mysqli_query($conn, $qcontri2);
									$fetch = $contri2->fetch_assoc();
									echo'<div>
											<blockquote>';
											if($_SESSION["user_id"] == $contrib["author_id"]){
												echo'<input type="hidden" value='.$contrib["contribution_id"].'>
													<button type="button" class="btn btn-default btn-xs pull-right delete_c">
														<span class="glyphicon glyphicon-remove" aria-hidden="true" aria-label="remove"></span>
													</button>';	
											}
									echo		'<h5>'.$contrib["contribution"].'</h5> 
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
							<button type="button" class="btn btn-success" disabled="disabled" id="wbtn" data-dismiss="modal">Post</button>
						</div>
					</div>
				</div>
			</div>
			<div id="contribute" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 name="ctitle" id="ctitle" class="modal-title"></h4>
							<input name="aid" type="hidden" value="" id="aid">
						</div>
						<div class="modal-body">
							<input name="id" type="hidden" value="" id="id">
							<textarea name="content" class="form-control write" id="ccontent" rows="7"></textarea>
							<div class="modal-footer">
								<h5 class="contri" id="cmax">170</h5>
								<button type="button" class="btn btn-success" disabled="disabled" id="cbtn" data-dismiss="modal">Contribute</button>
							</div>
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
		
		$("#wbtn").on("click", function(){
			var ptitle = $(this).parent().prev().prev().children().siblings(".write").val();
			var pcontent = $(this).parent().prev().children().val();
			var data = {wtitle : ptitle, wcontent : pcontent};
			
			$.ajax({
				url: "write.php",
				type: "POST",
				data: data,
				dataType: "json",
				success: function(post){
					$(".posts").prepend('<div class="panel panel-primary"><div class="panel-heading"><strong>'+post.post_title+'</strong><small class="edit">by <?php echo $_SESSION["username"];?></small></div><input type="hidden" value="'+post.author_id+'"><div class="panel-body"><p>'+post.post+'</p><div class="row"><div class="col-lg-4"><h5 class="contri"><span class="badge">'+post.no_contri+'</span> Contributors</h5><button type="button" class="btn btn-default btn-lg comments"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true" aria-label="down"></span></button></div><div class="col-lg-4 col-lg-offset-4"><input type="hidden" value="'+post.post_id+'"><button type="button" class="btn btn-default btn-lg edit favourite"><span class="glyphicon glyphicon glyphicon-star" aria-hidden="true" aria-label="favourite" id="i'+post.post_id+'"></span></button><button type="button" class="btn btn-default btn-lg edit add_c" data-toggle="modal" data-target="#contribute"><span class="glyphicon glyphicon-pencil" aria-hidden="true" aria-label="pencil"></span></button></div></div><ul class="list-group"></ul></div></div>');
				}
			});
			
		});
		
		$("#cbtn").on("click", function(){
			var pid = $(this).parent().prev().prev().val();
			var aid = $(this).parent().parent().prev().children().next().next().val();
			var ccontent = $(this).parent().prev().val();
			var data = {post_id : pid, author_id : aid, contribution : ccontent};
			$.ajax({
				url: "contribute.php",
				type: "POST",
				data: data,
				dataType: "json",
				success: function(contribute){
					$(".panel-primary .panel-body .col-lg-offset-4 [value="+pid+"]").parent().parent().next().append('<div><blockquote><input type="hidden" value='+contribute.contribution_id+'><button type="button" class="btn btn-default btn-xs pull-right delete_c"><span class="glyphicon glyphicon-remove" aria-hidden="true" aria-label="remove"></span></button><h5>'+contribute.contribution+'</h5> <footer><cite title="Source Title"><?php echo $_SESSION["username"];?></cite></footer></blockquote></div>');
					var x = $(".panel-primary .panel-body .col-lg-offset-4 [value="+pid+"]").parent().prev().children().find(".badge").text();
					$(".panel-primary .panel-body .col-lg-offset-4 [value="+pid+"]").parent().prev().children().find(".badge").text(parseInt(x)+1);
				}
			});
			
		});
		$(".row").on("click", ".add_c", function(){
			var id = $(this).prev().prev().val();
			var title = $(this).parent().parent().parent().prev().prev().find("strong").text();
			var a_id = $(this).parent().parent().parent().prev().val();
			$("#contribute #ctitle").text(title);
			$("#contribute #id").val(id);
			$("#contribute #aid").val(a_id);
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
		
		$(".row").on("click", ".favourite", function(){
			var n = $(this).prev().val();
			var faid = $(this).parent().parent().parent().prev().val();
			var ftitle = $(this).parent().parent().parent().prev().prev().find("strong").text();
			
			if($(this).children().css("color") == "rgb(0, 0, 0)"){
				$(this).children().css("color", "rgb(255, 204, 70)");
				var data = {post_id : n, author_id : faid, title : ftitle};
				$.ajax({
					url: "afave.php",
					type: "POST",
					data: data
				});
			}else{
				$(this).children().css("color", "rgb(0, 0, 0)");
				$.ajax({
					url: "dfave.php",
					type: "POST",
					data: {post_id : n}
				});
			}
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
		
		$("#notif").on("click", function(){
			$(this).css("color", "black");
		});
		
		$(".row").on("click", ".delete_c", function(){
			var conf = confirm("Are you sure you want to delete this post? You might miss it :(");
			if(conf){
				var contrid = $(this).prev().val();
				var postid = $(this).parent().parent().parent().prev().children().find("input").val();
				var contribution = $(this).parent().parent();
				var data = {contr_id : contrid, post_id : postid };
				$.ajax({
					url: "deleteContribution.php",
					type: "POST",
					data: data,
					success: function(no_contri){
						contribution.hide('slow', function(){ contribution.remove(); });
						$(".delete_c").parent().parent().parent().prev().children().children().find(".badge").text(no_contri);
					}
				});
			}
		});
	});
</script>
