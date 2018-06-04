<?php
include("connect.php");

if ($_POST) {
    $sapid = $_POST['sapid'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

    $qry2 = "SELECT * FROM user WHERE sapid='$sapid' and dob='$dob'";
    $result2 = mysql_query($qry2);
    $num_rows = mysql_num_rows($result2);
    if ($sapid !== '' and $dob !== '' and $password !== '') {
        if ($num_rows > 0) {
            $qry1 = "UPDATE user SET password = '$password' WHERE sapid='$sapid' and dob='$dob'";
            mysql_query($qry1);
            
            header("location: login.php?id=6");
        } else {
            
            $message = "Invalid SAP id or DOB.!!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            //echo "quarter problem.";
        }
    } else {
        $message = "Fill all the details!!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>
<style>
  body { background-image:url("images/baner.jpg");
          background-repeat: no-repeat;
          background-size: cover; }

</style>
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
<body>
        <span style="text-align: center;">
            <h2 style="background-color: #337ab7;margin-top: 0px;padding: 15px;color: white;font-family: cursive">Khaperkheda Thermal Power Station: E-library</h2>
        </span>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Forget Password 
					</span>
				</div>

                            <form class="login100-form validate-form" action="forget.php" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="SAP ID is required">
						<span class="label-input100">SAP ID</span>
						<input class="input100" type="text" name="sapid" placeholder="Enter sapid">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26" data-validate="DOB is required">
						<span class="label-input100">Date Of Birth</span>
                                                <input class="input100" type="date" name="dob" placeholder="Enter date of birth"  value="<?php if (isset($_POST['dob'])) echo $_POST['dob']; ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100"> New Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-b-30">
                                            <div> 
                                                <a href="login.php" class="txt1">
                                                             Remember Credentials? LogIn here
                                                    </a>
                                            </div>                                                
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Update Password
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
