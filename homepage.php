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
		<div class='row navi'>
			<nav class="navbar navbar-default">
				<div class="container-fluid" id="container">
					<div class="navbar-header">
						<div class="col-lg-12">
							<div class="col-lg-2">
								<a class="navbar-brand" href="#">
									<img id="logo" src="img/logo1.png">
								</a>
							</div>
							
							<div class="nav col-lg-3 col-lg-offset-2 col-md-offset-1">
								<form class="navbar-form" role="search">
									<input id="search" type="text" class="form-control" placeholder="Search">
								</form>
							</div>
							
							<div class="nav col-lg-2 col-lg-offset-3 col-md-offset-1" id="options">
								<button type="button" class="btn btn-default btn-lg">
									<a href="profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true" aria-label="User"></span></a>
								</button>
								
								<button type="button" class="btn btn-default btn-lg">
									<span class="glyphicon glyphicon-globe" aria-hidden="true" aria-label="Notifications"></span>
								</button>
								
								<button type="button" class="btn btn-default btn-lg">
									<span class="glyphicon glyphicon-off" aria-hidden="true" aria-label="Log-out"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
		
		<div id="userinfo"> <!-- user info and actions -->
			<div class="thumbnail">
				<img src="img/logo.png" alt="picture">
				<div class="caption">
					<h3 name="fname">NAME</h3>
					<h5 name="uname">username</h5>
				</div>
				<button type="button" class="btn btn-primary h4" data-toggle="modal" data-target="#write">Write</button>
			</div>
		</div>
		<!--<div class="featured thumbnail">
			<p>Post of the day</p>
			<p>Writer of the Day</p>
			<p>Most Contributed</p>
			<p>Most Favorite</p>
		</div>-->
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
				<div class="panel panel-primary">
					<div class="panel-heading"><strong>TITLE</strong><small class="edit">by <a href="#" class="author">GlowCloud</a></small></div>
						<div class="panel-body">
							<p>A friendly desert community where the sun is hot, 
							   the moon is beautiful, and mysterious lights pass 
							   overhead while we all pretend to sleep. 
							   Welcome to Night Vale.</p>
							<div class="row">
								<div class="col-lg-4">
									<h5 class="contri"><span class="badge">1</span> Contributors</h5>
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
							
							<ul class="list-group">
								<div>
									<blockquote>
										<h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</h5>
										<footer><cite title="Source Title">username</cite></footer>
									</blockquote>
								</div>
							</ul>
						</div>
				</div>
				<!-- copying  -->
				<div class="panel panel-primary">
					<div class="panel-heading"><strong>TITLE</strong><small class="edit">by <a href="#" class="author">GlowCloud</a></small></div>
					<div class="panel-body">
						<p>A friendly desert community where the sun is hot, 
						   the moon is beautiful, and mysterious lights pass 
						   overhead while we all pretend to sleep. 
						   Welcome to Night Vale.</p>
						<div class="row">
							<div class="col-lg-4">
								<h5 class="contri"><span class="badge">1</span> Contributors</h5>
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
						
						<ul class="list-group">
							<div>
								<blockquote>
									<h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</h5>
									<footer><cite title="Source Title">username</cite></footer>
								</blockquote>
							</div>
						</ul>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading"><strong>TITLE</strong><small class="edit">by <a href="#" class="author">GlowCloud</a></small></div>
					<div class="panel-body">
						<p>A friendly desert community where the sun is hot, 
						   the moon is beautiful, and mysterious lights pass 
						   overhead while we all pretend to sleep. 
						   Welcome to Night Vale.</p>
						<div class="row">
							<div class="col-lg-4">
								<h5 class="contri"><span class="badge">1</span> Contributors</h5>
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
						
						<ul class="list-group">
							<div>
								<blockquote>
									<h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</h5>
									<footer><cite title="Source Title">username</cite></footer>
								</blockquote>
							</div>
						</ul>
					</div>
				</div>
			</div>
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
