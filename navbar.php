<div class='row navi'>
			<nav class="navbar navbar-default">
				<div class="container-fluid" id="container">
					<div class="navbar-header">
						<div class="col-lg-12">
							<div class="col-lg-2">
								<a class="navbar-brand" href="homepage.php">
									<img id="logo" src="img/logo1.png">
								</a>
							</div>
							
							<div class="nav col-lg-3 col-lg-offset-2 col-md-offset-1">
								<form method="POST" action="search.php" class="navbar-form" role="search">
									<input name="search" id="search" type="text" class="form-control" placeholder="Search">
								</form>
							</div>
							
							<div class="nav col-lg-2 col-lg-offset-3 col-md-offset-1" id="options">
								<a class="btn btn-default btn-lg" href="profile.php"><span class="glyphicon glyphicon-user" aria-hidden="true" aria-label="User"></span></a>
								
								<div class="dropdown" style="display:inline;">
									<button type="button" class="btn btn-default btn-lg dropdown-toggle" id="notif" data-toggle="dropdown">
										<span class="glyphicon glyphicon-globe" aria-hidden="true" aria-label="Notifications"></span>
									</button>
									<ul class="dropdown-menu" aria-labelledby="notif">
										<?php
											require("connectdb.php");
											
											$n = "SELECT notification FROM notify WHERE user_id='".$_SESSION["user_id"]."' and nread='0'";
											$fetch = mysqli_query($conn, $n);
											
											if($fetch->num_rows > 0){
												echo"<style>#notif{color:red;}</style>";
												while($notif = $fetch->fetch_assoc()){
													echo "<li class='licontent'>".$notif["notification"]."</li><li role='separator' class='divider'></li>";
												}
												require("turnoffn.php");
											}else{
												echo"<li class='licontent'>Nothing new so far</li>";
											}
										?>
									</ul>
								</div>
								
								<a class="btn btn-default btn-lg" href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true" aria-label="Log-out"></span></a>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
