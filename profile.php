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
      .white{
        color: white;
      }
    </style>

</head>

<body>
    <header>
    <!-- Navigation -->
    <?php
		require("navbar.php");
		if(isset($_GET['id'])){
      		$id = $_GET['id'];
      	}else{
      		$id = $_SESSION['user_id'];
      	}
        $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id='{$id}'");
        $row = mysqli_fetch_assoc($query);
	?>
    </header>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
          <div class="col-sm-8" id="username"><h1><?php echo $row['username']?></h1></div>
          <div class="col-sm-4 pull-right" id="prof_pic">
              <?php
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
              <li class='list-group-item text-right' id="name"><span class='pull-left'><strong>Real name</strong></span><?php echo $row["name"]?></li>
              <?php 
              if($row["email"]!=""){
                echo "<li class='list-group-item text-right' id='email'><span class='pull-left'><strong>Email</strong></span>{$row["email"]}</li>";
              }
              if($row["school"]!=""){
                echo "<li class='list-group-item text-right' id='school'><span class='pull-left'><strong>School</strong></span>{$row["school"]}</li>";
              }
              if($row["address"]!=""){
                echo "<li class='list-group-item text-right' id='address'><span class='pull-left'><strong>Address</strong></span>{$row["address"]}</li>";
              }
              if($row["dob"]!="" && $row["dob"]!="0000-00-00"){
                echo "<li class='list-group-item text-right' id='dob'><span class='pull-left'><strong>Date of Birth</strong></span>{$row["dob"]}</li>";
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
                  $postquery = mysqli_query($conn,"SELECT COUNT(post_id) FROM post WHERE author_id='{$row['user_id']}'");
                  $postcount = mysqli_fetch_row($postquery);
                  echo $postcount[0];
                ?>
              </li>
              <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span>
                <?php 
                  echo (($row["no_followers"]=="")? "0" : "{$row["no_followers"]}") 
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
				   	<?php
                      $qpost = "SELECT * FROM post WHERE author_id='{$id}' ORDER BY pdate DESC";
                      $posts = mysqli_query($conn, $qpost);
                      
                      if($posts->num_rows > 0){
                        while($post = $posts->fetch_assoc()){
                          $qpost2 = "SELECT username FROM users WHERE user_id='".$post["author_id"]."'";
                          $post2 = mysqli_query($conn, $qpost2);
                          $row = $post2->fetch_assoc();
                          echo '<div class="panel panel-primary">
                              <div class="panel-heading"><strong>'.$post["post_title"].'</strong><small class="edit white"><span class="glyphicon glyphicon-remove remove" aria-hidden="true" aria-label="down"></span></small></div>
                              
                              <div class="panel-body">
                                <p>'.$post["post"].'</p>
                                <div class="row">
                                  <div class="col-lg-4">
                                    <h5 class="contri"><span class="badge">'.$post["no_contri"].'</span> Contributors</h5>
                                    <button type="button" class="btn btn-default btn-lg comments">
                                      <span class="glyphicon glyphicon-chevron-down" aria-hidden="true" aria-label="down"></span>
                                    </button>
                                  </div>
                                    
                                  <div class="col-lg-4 col-lg-offset-4 editing">
                                    <input type="hidden" value="'.$post["post_id"].'" >
                                    <button type="button" class="btn btn-default btn-lg edit add_f">
                                      <span class="glyphicon glyphicon-star-empty" aria-hidden="true" aria-label="favourite"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-lg edit add_c" data-toggle="modal" data-target="#contribute">
                                      <span class="glyphicon glyphicon-pencil" aria-hidden="true" aria-label="pencil"></span>
                                    </button>
                                  </div>
                                </div>
                          
                                  <ul class="list-group contri">';
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
            </div> <!--writem-->
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
            </div>  <!--contribute-->
        </div><!--/col-9-->
      </div><!--/row-->
    </div><!--/.container-->

    <!-- jQuery Version 1.11.1 -->
    <script src="jq/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="dist/js/bootstrap.min.js"></script>

    <!-- <script src="jq/update.js"></script> -->
    <script type="text/javascript">
      $(document).ready(function(){
        $(".contri").hide();
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
    
        $(".add_f").on("click", function(){
          var fav = $(this).children("span");
          fav.toggleClass("glyphicon-star-empty");
          fav.toggleClass("glyphicon-star");
          if(fav.hasClass("glyphicon-star")){
            alert("I have been loved");
          }else{
            alert("I have been hated");
          }
        });

        $(".remove").on("click", function(){
          var id = $(this).parent().parent().next().children(".row").children(".editing").children("input").val(); console.log(id);
          var post = $(this).parent().parent().parent();
          post.hide('slow', function(){ post.remove(); });

           $.ajax({
             url: "deletePost.php",
             type: "POST",
             data: {post_id : id},
             success: function(response){
               
             }
            });
        });
      });
    </script>

</body>

</html>
