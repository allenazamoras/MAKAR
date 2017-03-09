<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Makar | Log In</title>
        <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
		
		<style>
			body{
				background-image: url("img/11.png");
				width: 100%;
				height: 100%;
				z-index: 0;
			}
			#login-box{
				margin-top: 50px;
				border-radius: 3px;
				box-shadow: 0 1px 5px rgba(0, 0, 0, 0.25);
			}
			#desc{
				width: 415px;
				height: 600px; /*100vh*/
				position: absolute;
				display: inline;
				z-index: 2;
			}
			#login{
				height: 600px; /*100vh*/
				background-color: #ffffff;
				display: block;
				padding-top: 50px;
			}
			#logo{
				height: 175px;
				width: 190px;
				display: block;
				margin: auto;
				margin-top: 100px;
			}
			#words{
				margin-top: 100px;
				text-align: center;
			}
			#words2{
				width: 430px;
				margin-top: 70px;
				line-height: 125%;
				text-align: justify;
			}
			.words{
				font-family: "Yu Gothic Light", sans-serif;
				display: block;
				margin: auto;
				color: #cccccc;
			}
			.space1{
				padding-top: 50px;
			}
			.space2{
				padding-top: 20px;
			}
			#loginb{
				padding-top: 50px;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			#signb{
				padding-top: 40px;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			.breadcrumb{
				background-color: #ffffff;
				color: #397ac6;
			}
			button:hover{
				box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  				transition: 0.2s ease;
			}
			footer{
				padding-top: 10%;
			}
			.center-dc{
				display: flex;
				align-items: center;
				justify-content: center;
			}
			.input-group{
				width: 250px;
			}
			.shadow{
			   -moz-box-shadow:    inset 0 0 10px #000000;
			   -webkit-box-shadow: inset 0 0 10px #000000;
			   box-shadow:         inset 0 0 10px #000000;
			}
		</style>
	</head>
	
    <body>
        <div class='container-fluid'>
            <div class="row">
            	<div id="login-box">
					<div class="col-lg-4 col-lg-offset-2">
						<div>
							<img src="img/logo2.png" id="logo">
						</div>
						<div>
							<div class="words h4" id="words">A million dollars isn’t cool.</div>
							<div class="words h4" id="words2">You know what’s cool? A basilisk, the Arctic, silence, today's air quality, the policeman in the intersection, a bolo tie, Werner Herzog, that blinking red light in the night sky, and also writing. Welcome to Makar.</div>
						</div>
					</div>
					<div class="col-lg-4" id="login">
						<ul class="breadcrumb">
							<li role="presentation"><a class="log h4" href="#">Login</a></li>
							<li role="presentation"><a class="sign h4" href="#">Sign up</a></li>
						</ul>
						<div class="row">
							<div class="col-lg-12 center-dc l">
								<div>
									<form action="login_check.php" method="POST">
										<div class="input-group space1">
											<input name="email" type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon2" required>
											<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-envelope"></span></span>
										</div>
										
										<div class="input-group space2">
											<input name="password" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2" required>
											<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-link"></span></span>
										</div>
								
										<div id="loginb">
											<button type="submit" class="btn btn-primary">Login</button>
										</div>
									</form>
								</div>
							</div>
							
							<div class="col-lg-12 center-dc s">
								<div>
									<form action="register.php" method="POST">
										<div class="input-group space1">
											<input name="name" type="text" class="form-control" placeholder="Full Name" aria-describedby="basic-addon2" required>
											<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-user"></span></span>
										</div>
										
										<div class="input-group space2" id="run">
											<input name="username" type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon2" required>
											<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-tags"></span></span>
										</div>
							
										<div class="input-group space2" id="rem">
											<input name="email" type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon2" required>
											<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-envelope"></span></span>
										</div>
								
										<div class="input-group space2" id="rpass">
											<input name="password" type="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2" required>
											<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-link"></span></span>
										</div>
								
										<div class="input-group space2" id="rpass2">
											<input name="password2" type="password" class="form-control" placeholder="Do that one more time" aria-describedby="basic-addon2" required>
											<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-link"	></span></span>
										</div>
								
										<div id="signb">
											<button type="submit" class="btn btn-primary">Sign up</button>
										</div>
									</form>
								</div>
							</div>
							
						</div>
						<footer class="center-dc">
							<div class="col-lg-3">
								<button type="button" class="btn btn-default h4">ABOUT US</button>
							</div>
								
							<div class="col-lg-3">
								<button type="button" class="btn btn-default h4">TERMS</button>
							</div>
							
							<div class="col-lg-3">
								<button type="button" class="btn btn-default h4">PRIVACY</button>
							</div>
						</footer>
					</div>
				</div>	
            </div>
        </div>
    </body>
</html>

<script src="jq/jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$(".s").hide();
		
		$(".sign").on("click",function(){
				$(".l").hide();
				$(".s").show();
		});	
		
		$(".log").on("click",function(){
				$(".s").hide();
				$(".l").show();
		});		
		
	});
</script>
