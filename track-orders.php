<?php 

#cart class main css line 2498 2561

session_start();
error_reporting(0);
include('includes/config.php');

?>

    <!-- -------------------------- header start -------------------------- -->
    <?php

$page_title = "Track Orders - ZP SEMBS ENTERPRISE";
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
		<h3 >Track Orders</h3>
		<h4><a href="index.php">Home</a><label>/</label>TrackOrders</h4>
		<div class="clearfix"> </div>
	</div>
</div>





    <!-- -------------------------- start main section -------------------------- -->


    <div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <!-- <li><a href="home.html">Home</a></li>
                <li class='active'>Track your orders</li> -->
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
    <div class="container">
        <div class="track-order-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12">
                    <h2>Track your Order</h2>
                    <span class="title-tag inner-top-vs">Please enter your Order ID in the box below and press Enter. This was given to you on your receipt and in the confirmation email you should have received. </span>
                    <form class="register-form outer-top-xs" role="form" method="post" action="order-details.php">
                        <div class="form-group">
                            <label class="info-title" for="exampleOrderId1">Order ID</label>
                            <input type="text" class="form-control unicase-form-control text-input" name="orderid" id="exampleOrderId1">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleBillingEmail1">Registered Email</label>
                            <input type="email" class="form-control unicase-form-control text-input" name="email" id="exampleBillingEmail1">
                        </div>
                        <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">Track</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.sigin-in-->

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
