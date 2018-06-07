
<!--            BELOW CODE IS FOR INAUGARATIN PURPOSE ONLY      -->

<script type="text/javascript" src='js/jquery.js'></script>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			
			// when user clicks inside the container...
			$('.curtain_wrapper').click(function(){
				
				//..animate the description div by changing it's left position to it's width (but as negative number)...
				$(this).children('.description').animate({'left': -1*$(this).width()});
				//...animate the 2 curtain images to width of 50px with duration of 2 seconds...
				$(this).children('img.curtain').animate({ width: 0 },{duration: 2000});
				//...show the content behind the curtains with fadeIn function (2 seconds)
				$(this).children('.content').fadeIn(2000);
				
			});
			
		});
	</script>
	<style type="text/css" media="screen">
		/*BOTH CURTAIN IMAGES CLASS*/
		img.curtain{
			width:50%;
			height:100%; /* so jQuery doesn't keep ascpect ration when animating the width '*/
			z-index:99; /* to show it on top of the content*/
		}
		
		/*LEFT CURTAIN IMAGE CLASS*/
		img.curtainLeft{
			position:absolute; /*absolute positioning is important*/
			left:0px; /*position it on left side of the container*/
		}
		
		/*RIGHT CURTAIN IMAGE CLASS*/
		img.curtainRight{
			position:absolute; /*absolute positioning is important*/
			right:0px; /*position it on the right side of the container*/
		}
		
		/*THE CLASS OF THE WRAPPING DIV (THAT WRAPS EVERYTHING)*/
		.curtain_wrapper{
			width:100%; /* same as width of both the images summed */
			height:100%; /* same as height of the images*/
			position:relative; /*relative position so we can absolutely position the child elements*/
			overflow:hidden; /*hide everything out of boundaries (in this case for the description div)*/
			color:white; /* just styling*/
/*			background:white;  just styling*/
			
		}
		
		/*THE TEXT DIV CLASS (BEHIND THE CURTAINS)*/
		.content{
			position:relative; /*so we can center it*/
			width: 300px; /*curtain_wrapper width - shrinked image width (50px is image when shrinked)*/
			margin:0px auto; /*center it*/
			display:none; /*we don't want our users to see the content while the curtain images are loading*/
		}
		
		/*DESCRIPTION DIV CLASS (THE TEXT ON TOP LEFT SIDE IN THE DEMO)*/
		.description{
			position:absolute; /*absolute position is important*/
			top:0px; /*position it on top of the curtain_wrapper*/
			left:530px;
			z-index:100; /*show it on top of the curtain (remember that they have z-index of 99)*/
			/*styling bellow*/
			padding:5px; 
			text-align:center;
			font-size:15px;
			
			border:1px solid #ccc;
			border-left:0px;
			border-top:0px;
			color:#f99600;
		}
	</style>
	
	<div class='curtain_wrapper'>
    
	<!-- 2 CURTAIN IMAGES START HERE  -->
	<img class='curtain curtainLeft' src='images/curtainLeft.jpg' />
    <img class='curtain curtainRight' src='images/curtainRight.jpg' />
	    <!-- END IMAGES -->

		 <!-- START DESCRIPTION DIV, WHICH WILL BE SHOWN ON TOP OF THE CURTAIN AND REMOVED WHEN THE CURTAINS OPEN -->
    <div class='description' style="margin:0 auto;">
    	Click Anywhere To Visit E-Library!!
    </div>
    <!-- END DESCRIPTION DIV -->

<!--        INAUGARATION CODE ENDS-->
        
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
	<link rel="icon" type="image/png" href="images/icons/favicon.jpg"/>
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
           body { background-image:url("images/1.jpg");
                   background-repeat: no-repeat;
                   background-size: cover; }

        </style>
<body >
        <span style="text-align: center;">
            <h2 style="background-color: #ffad33;margin-top: 0px;padding: 15px;color: maroon;font-family: -webkit-pictograph;font-size: 46px">Khaperkheda Thermal Power Station: E-library</h2>
        </span>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/7.jpg);">
					<span class="login100-form-title-1">
						E-Library Gateway 
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
