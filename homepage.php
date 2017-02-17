<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
		<title>Makar</title>
		<style>
			body{
				background-color: #fafafa;
				margin: 0px;
			}
			h5{
				color: gray;
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
			#userinfo{
				position: fixed;
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
									<span class="glyphicon glyphicon-user" aria-hidden="true" aria-label="User"></span>
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
		
		<div class="row cont">
			<div class="col-lg-3">
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<div class="thumbnail">
							<img src="img/logo.png" alt="picture">
								<div class="caption">
									<h3>NAME</h3>
									<h5>@username</h5>
								</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-5">
				<div class="panel panel-primary">
					<div class="panel-heading">TITLE</div>
					<div class="panel-body">
						<p>A friendly desert community where the sun is hot, 
						   the moon is beautiful, and mysterious lights pass 
						   overhead while we all pretend to sleep. 
						   Welcome to Night Vale.</p>
						<div class="row">
							<div class="col-lg-4">
								<h5><span class="badge">1</span> Contributors</h5>
								<button type="button" id="comments" class="btn btn-default btn-lg">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true" aria-label="down"></span>
								</button>
							</div>
							
							<div class="col-lg-4 col-lg-offset-4">
								<button type="button" class="btn btn-default btn-lg edit">
									<span class="glyphicon glyphicon-star-empty" aria-hidden="true" aria-label="favourite"></span>
								</button>
								<button type="button" class="btn btn-default btn-lg edit">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true" aria-label="pencil"></span>
								</button>
							</div>
						</div>
						
						<ul class="list-group">
							<div>
								<blockquote>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
									<footer><cite title="Source Title">@username</cite></footer>
								</blockquote>
							</div>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="col-lg-3" id="box">
				
			</div>
		</div>
	</div>
</body>
</html>

<script src="jq/jquery.min.js"></script>
<script>
	$(".list-group").hide();
	$(document).ready(function(){
		$("#comments").on("click", function(){
			console.log("test");
			$(".list-group").toggle();
			$(this).children().toggleClass("glyphicon-chevron-down");
			$(this).children().toggleClass("glyphicon-chevron-up");
			console.log($(this).attr("class"));
		});
	});
</script>
