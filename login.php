<?php
include("connect.php");

if (isset($_SESSION['sapid'])) {
    header("location:index.php");
    exit();
}
 
if(isset($_GET['id'])) {
    IF ($_GET['id'] == 1) {
        $message = "Invalid login credentials..!!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    IF ($_GET['id'] == 6) {
        $message = "You have successfully changed the password!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    IF ($_GET['id'] == 5) {
        $message = "You have successfully registered!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>KHTPS-ELIBRARY</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
        <style>
/*           body { background-image:url("images/1.jpg");
                   background-repeat: no-repeat;
                   background-size: cover; }*/

        </style>
<body >
        <span style="text-align: center;">
            <h2 style="background-color: #337ab7;margin-top: 0px;padding: 15px;color: white;font-family: cursive">Khaperkheda Thermal Power Station: E-library</h2>
        </span>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/1.jpg);">
					<span class="login100-form-title-1">
						LogIn 
					</span>
				</div>

                            <form class="login100-form validate-form" action="login_exec.php" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
                                            <div>
                                                <a href="register.php" class="txt1">
                                                            Don't have account? Sign Up here
                                                    </a>
                                            </div>
                                            <div>
                                                <a href="forget.php" class="txt1">
                                                            Forgot Password?
                                                    </a>
                                            </div>                                                

					</div>
                                        <div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
  <?php     include('resources\themes\bootstrap\default_footer.php')  ?>
