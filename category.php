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
$cid=intval($_GET['cid']);
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
			header('location:my-cart.php');
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
?>

		<!-- -------------------------- start page validation -------------------------- -->
<?php

if(!isset($_GET['cid'])){
	header('location: index.php');
}

?>		

    <!-- -------------------------- end page validation -------------------------- -->
 
    <!-- -------------------------- header start -------------------------- -->
<?php
$category = "active";
require_once("includes/functions.php");
$page_title = getCategoryName($cid). " - ZP SEMBS ENTERPRISE";
require_once("includes/header.php");

?>
</head>
    
    <!-- -------------------------- header end -------------------------- -->


<body>

<!-- -------------------------- navbar start -------------------------- -->
<?php

require_once("includes/navbar.php");

?>
    
    <!-- -------------------------- navbar end -------------------------- -->


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
           <a href="#"><img class="first-slide" src="images/ba.jpeg" style="width: 100%; height: 350px" alt="First slide"></a>
       
        </div>
        <div class="item">
          <a href="#"> <img class="second-slide " src="images/ba1.jpeg" style="width: 100%; height: 350px" alt="Second slide"></a>
         
        </div>
        <div class="item">
           <a href="#"><img class="third-slide " src="images/ba2.png" style="width: 100%; height: 350px" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div><!-- /.carousel -->


<!--content-->
		<div class="product">
		<div class="container">
			<div class="spec ">
				<h3>Products</h3>
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					<b class="line"></b>
				</div>
			</div>
				<div class=" con-w3l agileinf">


                <!-- ------------------------------ start fetching data for category or subcategory ------------------------------ -->
<?php

if(isset($_GET['sid'])){
    $sid = $_GET['sid'];
    $ret=mysqli_query($con,"select * from products where category='$cid' and subCategory='$sid'");
} else{
    $ret=mysqli_query($con,"select * from products where category='$cid'");
}
if(!$ret){
	echo "connection Failed ". mysqli_error($result);
}
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{
?>							
                
                
          <div class="col-md-3 pro-1">
					<div class="col-m">
						<a href="#" data-toggle="modal" data-target="#Modal<?php echo htmlentities($row['id']);?>" class="offer-img">
							<img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" class="offer-img"  height="250px" alt="">
						</a>
						<div class="mid-1">
							<div class="women">
								<h6><a href="product.php?pid=<?php echo $row['id']; ?>"><?php echo substr($row['productName'],0,20).'...';?></a></h6>							
							</div>
							<div class="mid-2">
								<p ><label>$ <?php echo htmlentities($row['productPriceBeforeDiscount']);?></label><em class="item_price">$<?php echo htmlentities($row['productPrice']);?></em></p>
								  <div class="block">
									<div class="starbox small ghosting"> </div>
								</div>
								<div class="clearfix"></div>
							</div>
								<div class="add">
								 <button class="btn btn-danger my-cart-btn my-cart-b" data-id="<?php echo htmlentities($row['id']);?>" data-name="<?php echo htmlentities($row['productName']);?>" data-summary="<?php echo htmlentities($row['productDescription']); ?>" data-price="<?php echo htmlentities($row['productPrice']);?>" data-quantity="1" data-image="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>">
									 <a style="text-decoration: none; padding: 30px 20px;" class="btn-hover-manual" href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>">Add to Cart</a>
    								</button>										
							</div>
						</div>
					</div>
				</div>
<?php }}else{ ?>
                <div><h3>No Product Found</h3></div>
<?php
}    
?>

                <!-- ------------------------------ end fetching data for category or subcategory ------------------------------ -->

							<div class="clearfix"></div>
						 </div>
		</div>
	</div>
\

    <!-- -------------------------- footer start -------------------------- -->
<?php

require_once("includes/footer.php");

?>
    
    <!-- -------------------------- footer end -------------------------- -->


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
  
  
  
<?php
if(isset($_GET['sid'])){
	$sid = $_GET['sid'];
	$ret=mysqli_query($con,"select * from products where category='$cid' and subCategory='$sid'");
} else{
	$ret=mysqli_query($con,"select * from products where category='$cid'");
}
if(!$ret){
	echo "connection Failed ". mysqli_error($result);
}
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{
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
									  <span class="reducedfrom "><del>$<?php echo htmlentities($row['productPriceBeforeDiscount']);?></del>$<?php echo htmlentities($row['productPrice']);?>PKR</span>
									
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

<?php } // ?>	

<?php }else{ 

	# do nothing
	
}    
?>



				
</body>
</html>