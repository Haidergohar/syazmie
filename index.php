<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!-- start cart check code if any item is addedd to cart -->

<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:index.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}
// COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
			header('location:login.php');
		}
	else{
		mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
		echo "<script>alert('Product aaded in wishlist');</script>";
		header('location:my-wishlist.php');

		}
}
$home = "active";
$page_title = "Home - ZP SEMBS ENTERPRISE";

require_once("includes/functions.php");
require_once("includes/header.php");
?>
<!-- start cart check code if any item is addedd to cart -->


</head>

<body>

<?php
require_once("includes/navbar.php");
?>


<div data-vide-bg="video/video">
    <div class="container">
		<div class="banner-info">
			<h3>It is a long established fact that a reader will be distracted by 
			the readable </h3>	
			<div class="search-form">
				<form name="search" action="search-result.php" method="post">
					<input type="text" placeholder="Search here..." name="product" required="required">
					<input type="submit" value=" " >
				</form>
			</div>		
		</div>	
    </div>
</div>

    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>
    <script src="js/jquery.vide.min.js"></script>
		<!-- ------------------------------- end special offer section ------------------------------- -->





<!--content-->
	<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Our Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l">
				
				<!-- start special offer 2 data fetching -->

<?php
$ret=mysqli_query($con,"select * from products WHERE stock_quantity = 0");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...


?>
							<div class="col-md-3 pro-1">
								<div class="col-m">
									<a href="#" data-toggle="modal" data-target="#Modal<?php echo htmlentities($row['id']);?>" class="offer-img">
										<img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" class="offer-img" height="250px" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="product.php?pid=<?php echo $row['id']; ?>"><?php echo substr($row['productName'],0,20).'...';?></a></h6>							
										</div>
										<div class="mid-2">
											<p ><label>$<?php echo htmlentities($row['productPriceBeforeDiscount']);?></label><em class="item_price">$<?php echo htmlentities($row['productPrice']);?></em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
											<div class="add">
											 <button class="btn btn-danger my-cart-btn my-cart-b" data-id="<?php echo htmlentities($row['id']);?>" data-name="<?php echo htmlentities($row['productName']);?>" data-summary="summary 4" data-price="<?php echo htmlentities($row['productPrice']);?>" data-quantity="1" data-image="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>">
												 <a  style="text-decoration: none; padding: 30px 20px;" class="btn-hover-manual"  href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>">Add to Cart</a>
											</button>										
										</div>
									</div>
								</div>
							</div>
<?php } ?>
				<!-- end special offer 2 data fetching -->

							<div class="clearfix"></div>
						 </div>
		</div>
	</div>
<!-- ----------- footer ----------- -->
<?php
require_once("includes/footer.php");
?>
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


		<!-- ------------------------------- start special offer section modals------------------------------- -->

		<!-- ------------------------------- start fetching tab1 modal------------------------------- -->

<?php
$ret=mysqli_query($con,"select * from products where stock_quantity = 0");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...


?>
				<!-- product -->
			<div class="modal fade" id="Modal<?php echo htmlentities($row['id']);?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
								<div class="col-md-5 span-2">
											<div class="item">
												<img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" class="img-responsive" alt="">
											</div>
								</div>
								<div class="col-md-7 span-1 ">
									<h3><?php echo htmlentities($row['productName']);?></h3>
									<p class="in-para">There are many variations of passages of Lorem Ipsum.</p>
									<div class="price_single">
									  <span class="reducedfrom "><del>$<?php echo htmlentities($row['productPriceBeforeDiscount']);?> </del> $<?php echo htmlentities($row['productPrice']);?></span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"><?php echo $row['productDescription'];?></p>
									 <div class="add-to">
											 <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="<?php echo htmlentities($row['id']);?>" data-name="<?php echo htmlentities($row['productName']);?>" data-summary="summary 4" data-price="<?php echo htmlentities($row['productPrice']);?>" data-quantity="1" data-image="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>">
											 	<a style="text-decoration: none; padding: 30px 20px; color: white;" href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>">Add to Cart</a>
											 </button>
										</div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
<?php } ?>

		<!-- ------------------------------- end fetching tab1 modal------------------------------- -->
	
</body>
</html>