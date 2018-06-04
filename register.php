<?php
include("connect.php");

if (isset($_SESSION['sapid'])) {
    header("location:index.php");
    exit();
}
 
if ($_POST) {
    $sapid = $_POST['sapid'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $password = $_POST['pass'];
    $confirm_pass = $_POST['confirm_pass'];

    $checkusr_qry = "SELECT * FROM user WHERE sapid='$sapid'";
    $checkusr = mysql_query($checkusr_qry);
    $checkusr_res = mysql_fetch_array($checkusr);
    if($password != $confirm_pass) {
            echo "<script>
                    alert('Password Not matching..!!');
                    window.location.href='register.php';
                    </script>";
            exit();        
    }
    if ($sapid !== '' and $dob !== '' ) {

        if ($checkusr_res != true) {
            $qry1 = "insert into user ( `sapid`, `dob`,`name`,`password`) values($sapid,'$dob','$name','$password')";
            mysql_query($qry1);
            echo "<script>
                    alert('Information saved successfully..!!');
                    window.location.href='index.php';
                    </script>";
            exit();
        } else {
            $message = "User already registered!!";
            echo "<script type='text/javascript'>alert('$message');</script>";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password not matching';
  }
}
</script>
<body>
        <span style="text-align: center;">
            <h2 style="background-color: #337ab7;margin-top: 0px;padding: 15px;color: white;font-family: cursive">Khaperkheda Thermal Power Station: E-library</h2>
        </span>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
                                        <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                                                <span class="login100-form-title-1">
                                                        SignUp 
                                                </span>
                                        </div>                            <form class="login100-form validate-form" action="register.php" method="post">
                                        <div class="wrap-input100 validate-input m-b-26" data-validate="Name is required">
						<span class="label-input100">Name</span>
						<input class="input100" type="text" name="name" placeholder="Enter Name"  value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="sapid is required">
						<span class="label-input100">SAPID</span>
                                                <input class="input100" type="number" name="sapid" placeholder="Enter sapid"  value="<?php if (isset($_POST['sapid'])) echo $_POST['sapid']; ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="DOB is required">
						<span class="label-input100">Date Of Birth</span>
                                                <input class="input100" type="date" name="dob" placeholder="Enter date of birth"  value="<?php if (isset($_POST['dob'])) echo $_POST['dob']; ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" id="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Confirm Password</span>
                                                <input class="input100" type="password" id="confirm_password" name="confirm_pass" placeholder="Confirm password" onkeyup='check();'>
						<span class="focus-input100"></span>
					</div>                                
                                          <span id='message'></span>

					<div class="flex-sb-m w-full p-b-30">
                                            <div> 
                                                <a href="login.php" class="txt1">
                                                             Already have account? LogIn here
                                                    </a>
                                            </div>                                                
					</div>
                                        <div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Register
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
