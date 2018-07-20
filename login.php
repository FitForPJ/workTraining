<?php 

		session_start();
	include_once "database/config.php";


if(isset($_REQUEST['username'])){
	$user = $_REQUEST['username'];
	$pass =$_REQUEST['pass'];
	
	$sql="SELECT * FROM user_login where am_user = '".$user."' and am_pass='".$pass."'";
	$result= $conn->query($sql);
	$rows=mysqli_num_rows($result);
	$followingdata = $result->fetch_assoc();

	 if($rows==0){
		echo "<script language='javascript'>alert('Username or Password incorrect')</script>";
		}else{
	 
	   	$_SESSION['userlogin']=$followingdata['am_user'];
		   $_SESSION['userid']=$followingdata['am_id'];
		   
	   	echo "<meta http-equiv='refresh' content='0;url=index.php' />";
	   exit(0);
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="node_modules/hamburgers/dist/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="node_modules/animsition/dist/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="node_modules/select2/dist/css/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="node_modules/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login/util.css">
	<link rel="stylesheet" type="text/css" href="css/login/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<!-- <div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label> -->
					<!-- </div> -->

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<!-- <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="node_modules/jquery/dist/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="node_modules/animsition/dist/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="node_modules/popper.js/dist/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="node_modules/select2/dist/js/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="node_modules/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="js/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/login/main.js"></script>

</body>
</html>