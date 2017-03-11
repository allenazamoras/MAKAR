<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header("location: login.php");
	}
  require("connectdb.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile | MAKAR</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
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
      .panel-heading{
          background-image: linear-gradient(#04519b,#044687 60%,#033769);
          color: #fff !important; 
      }
      #prof_pic{
        height: 200px;
        width: 200px;
        padding: 0;
      }
    </style>

</head>

<body>
    <header>
    <!-- Navigation -->
    <?php
			require("navbar.php");
		?>
    </header>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
          <div class="col-sm-8" id="username"><h1><?php echo $_SESSION['username']?></h1></div>
          <div class="col-sm-4 pull-right" id="prof_pic">
              <?php
                $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id='{$_SESSION['user_id']}'");
                $row = mysqli_fetch_assoc($query);
                  if($row['profile_pic'] == ""){
                    echo "<img title='profile image' class='img-responsive' src='img/default.png' alt='Default Profile Pic'>";
                  } else {
                    echo "<img title='profile image' class='img-responsive img-thumbnail' src='img/".$row['profile_pic']."' alt='Profile Pic'>";
                  }
                  echo "<br>";
              ?>
          </div>
      </div>
      <div class="row">
        <div class="col-sm-3"><!--left col-->
                
            <ul class="list-group">
              <li class="list-group-item text-muted">Profile</li>
              <li class='list-group-item text-right' id="name"><span class='pull-left'><strong>Real name</strong></span><?php echo $_SESSION["name"]?></li>
              <?php 
              if($_SESSION["email"]!=""){
                echo "<li class='list-group-item text-right' id='email'><span class='pull-left'><strong>Email</strong></span>{$_SESSION["email"]}</li>";
              }
              if($_SESSION["school"]!=""){
                echo "<li class='list-group-item text-right' id='school'><span class='pull-left'><strong>School</strong></span>{$_SESSION["school"]}</li>";
              }
              if($_SESSION["phone_no"]!=""){
                echo "<li class='list-group-item text-right' id='phone_no'><span class='pull-left'><strong>Phone Number</strong></span>{$_SESSION["phone_no"]}</li>";
              }
              if($_SESSION["address"]!=""){
                echo "<li class='list-group-item text-right' id='address'><span class='pull-left'><strong>Address</strong></span>{$_SESSION["address"]}</li>";
              }
              if($_SESSION["dob"]!="" && $_SESSION["dob"]!="0000-00-00"){
                echo "<li class='list-group-item text-right' id='dob'><span class='pull-left'><strong>Date of Birth</strong></span>{$_SESSION["dob"]}</li>";
              }
              
              ?>
            </ul> 
             
            <!-- NOTICE: if you want to use the fa classes, add <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">  they add icons -->  
            <div class="panel panel-default">
              <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
              <div class="panel-body"><a href="http://bootply.com">bootply.com</a></div>
            </div>
            
            <ul class="list-group">
              <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
              <!-- <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li> -->
              <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span>
                <?php
                  $postquery = mysqli_query($conn,"SELECT COUNT(post_id) FROM post WHERE author_id='{$_SESSION['user_id']}'");
                  $postcount = mysqli_fetch_row($postquery);
                  echo $postcount[0];
                ?>
              </li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span>
                <?php 
                  echo (($_SESSION["no_followers"]=="")? "0" : "{$_SESSION["no_followers"]}") 
                ?>
              </li>
            </ul>     
                 
            <div class="panel panel-default">
              <div class="panel-heading">Social Media</div>
              <div class="panel-body">
                <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
              </div>
            </div>
            
        </div><!--/col-3-->
        <div class="col-sm-9">
            
            <ul class="nav nav-tabs" id="myTab">
              <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
              <li><a href="#messages" data-toggle="tab">Messages</a></li>
              <li><a href="#update" data-toggle="tab">Update Information</a></li>
            </ul>
                
            <div class="tab-content">
               <div class="tab-pane active" id="home">
                
                   <hr>
                    <!-- <nav aria-label="Page navigation" class="col-md-4 col-md-offset-4 text-center">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#home" data-toggle="tab">Home</a></li>
                        <li class="page-item"><a class="page-link" href="#messages" data-toggle="tab">Messages</a></li>
                        <li class="page-item"><a class="page-link" href="#update" data-toggle="tab">update</a></li>
                      </ul>
                    </nav> -->
                    <h4>Recent Activity</h4>
                    <hr>
               </div><!--/tab-pane-->
               <div class="tab-pane" id="messages">
                 
                 <h2></h2>
                 
                 <ul class="list-group">
                    <li class="list-group-item text-muted">Inbox</li>
                    <li class="list-group-item text-right"><a href="#" class="pull-left">Here is your a link to the latest summary report from the..</a> 2.13.2014</li>
                    <li class="list-group-item text-right"><a href="#" class="pull-left">Hi Joe, There has been a request on your account since that was..</a> 2.11.2014</li>
                    <li class="list-group-item text-right"><a href="#" class="pull-left">Nullam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                    <li class="list-group-item text-right"><a href="#" class="pull-left">Thllam sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                    <li class="list-group-item text-right"><a href="#" class="pull-left">Wesm sapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                    <li class="list-group-item text-right"><a href="#" class="pull-left">For therepien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                    <li class="list-group-item text-right"><a href="#" class="pull-left">Also we, havesapien massaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                    <li class="list-group-item text-right"><a href="#" class="pull-left">Swedish chef is assaortor. A lobortis vitae, condimentum justo...</a> 2.11.2014</li>
                    
                  </ul> 
                 
               </div><!--/tab-pane-->
               <div class="tab-pane" id="update">
                    <hr>
                    <form class="form updateinfo" action="updateinfo.php" method="post" id="updateform">
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                                <label><h4>Username</h4></label>
                                <input type="text" class="form-control" name="username" placeholder="enter a username" title="enter an awesome username.">
                            </div>
                        </div>
                        <!-- to be added to db later -->
                        <!-- <div class="form-group">
                            
                            <div class="col-xs-6">
                                <label for="phone"><h4>Phone</h4></label>
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                               <label for="mobile"><h4>Mobile</h4></label>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                            </div>
                        </div> -->
            
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label><h4>Email</h4></label>
                                <input type="email" class="form-control" name="email" placeholder="you@email.com" title="enter your email and not somebody else's.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label><h4>Address</h4></label>
                                <input type="text" class="form-control" name="address" placeholder="somewhere" title="enter a location.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                               <label><h4>School</h4></label>
                                <input type="text" class="form-control" name="school" placeholder="school of cool" title="what school did you go to?">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                               <label><h4>Date of Birth</h4></label>
                                <input type="date" class="form-control" name="dob" title="when were you born?">
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label><h4>New Password</h4></label>
                                <input type="password" class="form-control" name="newpassword" placeholder="new password" title="enter a new password if you don't like your old one.">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                              <label><h4>Verify Old Password</h4></label>
                                <input type="password" class="form-control" name="oldpassword" placeholder="old password" title="enter your old password. For old time's sake.">
                            </div> 
                        </div>
                        <div class="form-group">
                             <div class="col-xs-12">
                                  <br>
                                  <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                  <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                              </div>
                        </div>
                    </form>

                    <hr><br><br>
                    <form class="form updateprofpic" action="updateprofpic.php" method="post" enctype="multipart/form-data" id="updateprofpicform">
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label><h4>Upload a Profile Picture</h4></label>
                              <input type="file" name="file">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Upload</button>
                            </div>
                      </div>
                    </form>
               </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->
      </div><!--/row-->
    </div><!--/.container-->

    <!-- jQuery Version 1.11.1 -->
    <script src="jq/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="dist/js/bootstrap.min.js"></script>

    <!-- <script src="jq/update.js"></script> -->
    <script type="text/javascript">
      $('form.updateinfo').on('submit',function(){
        var that = $(this),
          url = that.attr('action'); 
          type = that.attr('method'); 
          data = {};

          that.find('[name]').each(function(index,value){
           var that = $(this),
             name = that.attr('name'),
             value = that.val();
           data[name] = value;
          });

          $.ajax({
           url: url,
           type: type,
           data: data,
           dataType: "json",
           success: function(response){
             alert("User Information Updated!");
             document.getElementById("updateform").reset();

             $('#username').children('h1').text(response.username);
             $('#email').html("<span class='pull-left'><strong>Email</strong></span>"+response.email);
             $('#school').html("<span class='pull-left'><strong>School</strong></span>"+response.school);
             $('#address').html("<span class='pull-left'><strong>Address</strong></span>"+response.address);
             $('#dob').html("<span class='pull-left'><strong>Date of Birth</strong></span>"+response.dob);
           }
          });
        return false;
      });
    </script>

</body>

</html>
