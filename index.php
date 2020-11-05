<?php
include("config/database.php");
error_reporting(0);
extract($_POST);
if(isset($submit))
{
	$rs=mysqli_query($cn,"select * from mst_user where login='$loginid' and pass='$pass'");
	$row=mysqli_fetch_array($rs);
	if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION['id']=$row['id'];
		$_SESSION['username']=$row['username'];
		$_SESSION[login]=$loginid;
		header('Location: user/');		
	}
}
if(isset($admin_submit))
{
	
	$rs=mysqli_query($cn,"select * from mst_admin where loginid='$loginid' and pass='$pass'");
	$row=mysqli_fetch_array($rs);
	if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION['id']=$row['id'];
		$_SESSION['login']=$loginid;
		header('Location: admin/dashboard.php');		
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77417952-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 100px!important;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
						<?php
						  if(isset($found))
						  {
						?>
							<div class="alert alert-danger">
								<strong>Error !</strong> Invalid Username or Password
							</div>
						<?php
							}
						?>
						<?php
						if($_GET['stat']==200)
							{
						?>
							<div class="alert alert-success">
								<strong>Success !</strong> Thank You for Register. Login Here
							</div>
						<?php
							}
						?>
					<form class="user" method="post" action="" id="user_section"> 
						<div class="form-group">
						  <input type="text" class="form-control form-control-user" name="loginid"  placeholder="Enter Loginid..." >
						</div>
						<div class="form-group">
						  <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="pass" placeholder="Password" >
						</div>
						<button type="submit" class="btn btn-primary btn-user btn-block" name="submit">
						 Login Here
						</button>
                    </form>
                    
				<form class="user" id="admin_section" method="post" action="" style="display:none;"> 
						<div class="form-group">
						  <input type="text" class="form-control form-control-user" name="loginid"  placeholder="Enter Loginid...">
						</div>
						<div class="form-group">
						  <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="pass" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary btn-user btn-block" name="admin_submit">
						  Admin Login
						</button>
                    </form>
                  <hr>
				   <div class="row">
						<div class="col-md-6">
							<button type="button" class="btn btn-success btn-block" id="admin">Admin</button>
						</div>
						<div class="col-md-6">
							<button type="button" class="btn btn-success btn-block" id="user">User</button>
						</div>
					</div>
                  <!--<div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div>-->
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          	<div class="container card">

   
 
</div>
          
          
          
          
          
          
        </div>
		</div>
		
	
		
		
		
    </div>
</div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script>
$(document).ready(function(){
  $("#admin").click(function(){
    $("#admin_section").show();
	$("#user_section").hide();
  });
  $("#user").click(function(){
    $("#user_section").show();
	$("#admin_section").hide();
  });
});
</script>
</body>

</html>
