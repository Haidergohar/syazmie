<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php

session_start();
error_reporting(0);
include('includes/config.php');

//page validation
if(strlen($_SESSION['login'])!=0){   
	header('location:index.php');
	}


// Code user Registration
if(isset($_POST['submit']))
{
	$name=$_POST['fullname'];
	$email=$_POST['emailid'];
	$contactno=$_POST['contactno'];
	$password=$_POST['password'];
	$con_password=$_POST['confirmpassword'];

    // name validation
    $pattern_Un = "/^[a-zA-Z ]{3,15}$/";
    if(!preg_match($pattern_Un, $name) || $name == "Full Name"){
        $errUn = "Must be atleast 3 characters long, letter and spaces allowed";
    }

	if($contactno == "" || $contactno == "Contact No"){
		$errCn = "Contact Number Required";
	}

	// email validation
	$pattern_email = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)[a-z]{2,6}$/i";
	if(!preg_match($pattern_email, $email)){
		$errUe = "Invalid format of email";
	}
	else{
		$query=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
		if(!$query){
			die("Query Failed " . mysqli_error($con));
		}
		$count = mysqli_num_rows($query);
		if($count == 1){
			$errUe = "Email already registered";
		}
	}

	// password validation
	if($password == "Password"){
		$errUp = "Password Required"; 
	}
	else if($password == $con_password){
		$pattern_up = "/^.*(?=.{4,56})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
		if(!preg_match($pattern_up, $password))			$errUp = "Must be atleast 4 characters long, 1 upper case, 1 lower case letter and 1 number exist";
		}
	}
	else{
		$errUp = "Password Doesn't Match"; 
	}





	if(!isset($errUe) && !isset($errUp) && !isset($errUn) && !isset($errCn)){

		$password=md5($_POST['password']);
		$query=mysqli_query($con,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
		if($query)
		{
			header('location:login.php?m=success');
		}
		else{
		echo "<script>alert('Not register something went wrong');</script>";
		}
	}

?>


<?php

$page_title = "Register - ZP SEMBS ENTERPRISE";
require_once("includes/header.php");

?>

</head>

<body>
  <!---->


<?php

require_once("includes/navbar.php");

?>



 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Register</h3>
		<h4><a href="index.html">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!--login-->

	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<form action="register.php" method="post">
						<?php echo isset($errUn)?"<span style='color:red; font-size:12px;'>{$errUn}</span>":""; ?>
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="<?php echo isset($name)? $name:"Full Name" ?>" name="fullname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Full Name';}" required="required">
							<div class="clearfix"></div>
						</div>
						<?php echo isset($errUe)?"<span style='color:red; font-size:12px;'>{$errUe}</span>":""; ?>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="<?php echo isset($email)? $email:"Email" ?>" name="emailid" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="required">
							<div class="clearfix"></div>
						</div>						
						<?php echo isset($errCn)?"<span style='color:red; font-size:12px;'>{$errCn}</span>":""; ?>	
						<div class="key">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<input  type="text" value="<?php echo isset($contactno)? $contactno:"Contact No" ?>" name="contactno" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Contact No';}" required="required">
							<div class="clearfix"></div>
						</div>
						<?php echo isset($errUp)?"<span style='color:red; font-size:12px;'>{$errUp}</span>":""; ?>						
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="required">
							<div class="clearfix"></div>
						</div>
						<?php echo isset($errUp)?"<span style='color:red; font-size:12px;'>{$errUp}</span>":""; ?>						
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password" name="confirmpassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="required">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Register" name="submit">
					</form>
				</div>
				
			</div>
		</div>
<!--footer-->

<?php

require_once('includes/footer.php');

?>

<!-- //footer-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->


</body>
</html>