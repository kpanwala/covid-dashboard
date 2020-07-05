<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{   
    $e = $_POST['username'];
    $psw = $_POST['password'];

    if($e == "admin" && $psw == "Admin123"){
		$_SESSION['login']=$_POST['username'];          
        header("location:admin-display.php");
        exit();
    }
    else{
        $ret=mysqli_query($con,"SELECT * FROM users WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
        $num=mysqli_fetch_array($ret);
        if($num>0) {
            $_SESSION['login']=$_POST['username'];
            $_SESSION['id']=$num['id'];
            header("location:user-display.php");
            exit();
        }
        else{
            echo '<script type="text/javascript">alert("Wrong Username or Password!!!")</script>';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User-Login</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	</head>
	<body class="login" style="background-image: url(images/cv2new.jpg); background-size: cover;">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a style="text-decoration: none;"><h2 style="color:red;"></h2></a>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend style = "color:lightblue;">
								Sign in to your account
							</legend>
							<p style = "color:lightblue;">
								Please enter your name and password to log in.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="username" placeholder="Username">
									<i class="fa fa-user" style = "color:lightblue;"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="password" placeholder="Password">
									<i class="fa fa-lock" style = "color:lightblue;"></i>
									 </span>
                                
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Login <i class="fa fa-arrow-circle-right" style = "color:lightblue;"></i>
								</button>
							</div>
							<div class="new-account" style = "color:lightblue;">
								Don't have an account yet?
								<a href="registration.php" style="text-decoration: none;">
									Create an account
								</a>
							</div>
						</fieldset>
					</form>

				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	
		
	</body>
	<!-- end: BODY -->
</html>