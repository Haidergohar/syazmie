<?php 

#cart class main css line 2498 2561

session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{
	
	if(isset($_POST['update']))
	{
		$name=$_POST['name'];
		$contactno=$_POST['contactno'];
		$query=mysqli_query($con,"update users set name='$name',contactno='$contactno' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Your info has been updated');</script>";
		}
	}

	// code for billing address updation
	if(isset($_POST['billingupdate']))
	{
		$baddress=$_POST['billingaddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		$bpincode=$_POST['billingpincode'];
		$query=mysqli_query($con,"update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Billing Address has been updated');</script>";
		}
	}

// code for Shipping address updation

if(isset($_POST['shipupdate']))
{
    $saddress=$_POST['shippingaddress'];
    $sstate=$_POST['shippingstate'];
    $scity=$_POST['shippingcity'];
    $spincode=$_POST['shippingpincode'];
    $query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
    if($query)
    {
echo "<script>alert('Shipping Address has been updated');</script>";
		}
		if(isset($_GET['m'])){
			header("location:payment-method.php");
		}
}


date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sql=mysqli_query($con,"SELECT password FROM  users where password='".md5($_POST['cpass'])."' && id='".$_SESSION['id']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($con,"update students set password='".md5($_POST['newpass'])."', updationDate='$currentTime' where id='".$_SESSION['id']."'");
echo "<script>alert('Password Changed Successfully !!');</script>";
}
else
{
	echo "<script>alert('Current Password not match !!');</script>";
}
}


?>


    <!-- -------------------------- start script -------------------------- -->

<script type="text/javascript">
    function valid()
    {
    if(document.chngpwd.cpass.value=="")
    {
    alert("Current Password Filed is Empty !!");
    document.chngpwd.cpass.focus();
    return false;
    }
    else if(document.chngpwd.newpass.value=="")
    {
    alert("New Password Filed is Empty !!");
    document.chngpwd.newpass.focus();
    return false;
    }
    else if(document.chngpwd.cnfpass.value=="")
    {
    alert("Confirm Password Filed is Empty !!");
    document.chngpwd.cnfpass.focus();
    return false;
    }
    else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
    {
    alert("Password and Confirm Password Field do not match  !!");
    document.chngpwd.cnfpass.focus();
    return false;
    }
    return true;
    }
</script>

    <!-- -------------------------- end validation script -------------------------- -->




    <!-- -------------------------- header start -------------------------- -->
    <?php

$page_title = "My Account - ZP SEMBS ENTERPRISE";
require_once("includes/header.php");

?>


	<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/green.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/owl.transitions.css">
	<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
	<link href="assets/css/lightbox.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/rateit.css">
	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
	<!-- Demo Purpose Only. Should be removed in production -->
	<link rel="stylesheet" href="assets/css/config.css">
	<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
	<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
	<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
	<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
	<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
	<!-- Demo Purpose Only. Should be removed in production : END -->
	
	<!-- Icons/Glyphs -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
 <!-- Fonts --> 
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

</head>
    
    <!-- -------------------------- header end -------------------------- -->
<body>

<!-- -------------------------- navbar start -------------------------- -->
<?php

require_once("includes/navbar.php");

?>
    
    <!-- -------------------------- navbar end -------------------------- -->

 <!--banner-->
 <div class="banner-top">
	<div class="container">
		<h3 >My Account</h3>
		<h4><a href="index.php">Home</a><label>/</label>myacount</h4>
		<div class="clearfix"> </div>
	</div>
</div>





    <!-- -------------------------- start main section -------------------------- -->

    <div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<!-- <li><a href="#">Home</a></li> -->
				<!-- <li class='active'>myaccount</li> -->
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-12">
					<?php
						if(isset($_GET['m']) && ($_GET['m'] == "s_a")){
					?>
						<div style="background-color: red; color: white; padding: 10px; text-align: center; margin-bottom: 20px; font-size: 18px">Please provide your shipping address details before checkout.</div>
					<?php
						}
					?>
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading" style="background-color:#F5F5F5; border: 1px solid lightgrey;">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne" style="font-weight: bold;">
	          <span>1</span>My Profile
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body" style="border: 1px solid lightgrey;">
			<div class="row">		
<h4>Personal info</h4>
				<div class="col-md-12 col-sm-12 already-registered-login">

<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

					<form class="register-form" role="form" method="post">
<div class="form-group">
					    <label class="info-title" for="name">Name<span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['name'];?>" id="name" name="name" required="required">
					  </div>



						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
			 <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="<?php echo $row['email'];?>" readonly>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Contact No.">Contact No. <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" required="required" value="<?php echo $row['contactno'];?>"  maxlength="10">
					  </div>
					  <button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
					</form>
					<?php } ?>
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading" style="background-color:#F5F5F5; border: 1px solid lightgrey;">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo" style="font-weight: bold;">
						          <span>2</span>Change Password
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse collapse">
						      <div class="panel-body" style="border: 1px solid lightgrey">
						     
					<form class="register-form" role="form" method="post" name="chngpwd" onSubmit="return valid();">
<div class="form-group">
					    <label class="info-title" for="Current Password">Current Password<span>*</span></label>
					    <input type="password" class="form-control unicase-form-control text-input" id="cpass" name="cpass" required="required">
					  </div>



						<div class="form-group">
					    <label class="info-title" for="New Password">New Password <span>*</span></label>
			 <input type="password" class="form-control unicase-form-control text-input" id="newpass" name="newpass">
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Confirm Password">Confirm Password <span>*</span></label>
					    <input type="password" class="form-control unicase-form-control text-input" id="cnfpass" name="cnfpass" required="required" >
					  </div>
					  <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Change </button>
					</form> 




						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-02  -->
                    						<!-- checkout-step-03  -->
<div class="panel panel-default checkout-step-01">

<!-- panel-heading -->
    <div class="panel-heading" style="background-color:#F5F5F5; border: 1px solid lightgrey;">
    <h4 class="unicase-checkout-title">
        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseThree" style="font-weight: bold;">
          <span>3</span>Billing Address
        </a>
     </h4>
</div>
<!-- panel-heading -->

<div id="collapseThree" class="panel-collapse collapse">

    <!-- panel-body  -->
    <div class="panel-body" style="border: 1px solid lightgrey;">
        <div class="row">		
            <div class="col-md-12 col-sm-12 already-registered-login">

<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

                <form class="register-form" role="form" method="post">
<div class="form-group">
                    <label class="info-title" for="Billing Address">Billing Address<span>*</span></label>
                    <textarea class="form-control unicase-form-control text-input" style="resize: none;" name="billingaddress" required="required"><?php echo $row['billingAddress'];?></textarea>
                  </div>



                    <div class="form-group">
                    <label class="info-title" for="Billing State ">Billing State  <span>*</span></label>
         <input type="text" class="form-control unicase-form-control text-input" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState'];?>" required>
                  </div>
                  <div class="form-group">
                    <label class="info-title" for="Billing City">Billing City <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="billingcity" name="billingcity" required="required" value="<?php echo $row['billingCity'];?>" >
                  </div>
<div class="form-group">
                    <label class="info-title" for="Billing Pincode">Billing Pincode <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['billingPincode'];?>" >
                  </div>


                  <button type="submit" name="billingupdate" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                </form>
                <?php } ?>
            </div>	
            <!-- already-registered-login -->		

        </div>			
    </div>
    <!-- panel-body  -->

</div><!-- row -->
</div>
<!-- checkout-step-03  -->
                    <!-- checkout-step-04  -->
                      <div class="panel panel-default checkout-step-02">
                        <div class="panel-heading" style="background-color:#F5F5F5; border: 1px solid lightgrey;">
                          <h4 class="unicase-checkout-title">
                            <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour" style="font-weight: bold;">
                              <span>4</span>Shipping Address
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                          <div class="panel-body" style="border: 1px solid lightgrey;">
                         
            <?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

                <form class="register-form" role="form" method="post">
<div class="form-group">
                    <label class="info-title" for="Shipping Address">Shipping Address<span>*</span></label>
                    <textarea class="form-control unicase-form-control text-input" " name="shippingaddress" required="required"><?php echo $row['shippingAddress'];?></textarea>
                  </div>



                    <div class="form-group">
                    <label class="info-title" for="Billing State ">Shipping State  <span>*</span></label>
         <input type="text" class="form-control unicase-form-control text-input" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState'];?>" required>
                  </div>
                  <div class="form-group">
                    <label class="info-title" for="Billing City">Shipping City <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity'];?>" >
                  </div>
<div class="form-group">
                    <label class="info-title" for="Billing Pincode">Shipping Pincode <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode'];?>" >
                  </div>


                  <button type="submit" name="shipupdate" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                </form>
                <?php } ?>




                          </div>
                        </div>
                      </div>
                      <!-- checkout-step-04  -->
                      

                          
                          
					</div><!-- /.checkout-steps -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
</div>
</div>


    <!-- -------------------------- end main section -------------------------- -->
















    <!-- -------------------------- footer start -------------------------- -->



<?php

require_once("includes/footer.php");

?>
    
    <!-- -------------------------- footer end -------------------------- -->







    <!-- -------------------------- start script of main section -------------------------- -->

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<!-- Creating Problem in Navbar Dropdown -->
	<!-- <script src="assets/js/bootstrap.min.js"></script> -->
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

    <!-- -------------------------- end script of main section -------------------------- -->

















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
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>


</body>
</html>
<?php } ?>
