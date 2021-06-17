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

$pid=intval($_GET['pid']);

if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

}
}

# it is for post for review button not decide yet........................................................................
if(isset($_POST['submit']))
{
	$qty=$_POST['quality'];
	$price=$_POST['price'];
	$value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($con,"insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}

//CODE FOR VALIDATION.........................................................

if(isset($_GET['pid']) or isset($_GET['id'])){


?>
<!-- -------------------------- header start -------------------------- -->
<?php
require_once("includes/functions.php");

$page_title = getProductName($pid). " - ZP SEMBS ENTERPRISE";

require_once("includes/header.php");

?>
    
	<!-- -------------------------- header end -------------------------- -->
	

	<!-- script for change image -->

	<script>
	

		function changeImage(t){
			var img = t.getAttribute("src");
			var destination = document.getElementById("picture-frame");
			// destination.setAttribute("src", img);
			// destination.setAttribute("data-src", img);	
			var new_img = "<img src='"+img+"' data-src='"+img+"' class='img-responsive'>";
			destination.innerHTML = new_img;
		}
	
	</script>

	<!-- script for change image -->


</head>

<body>

      <!-- -------------------------- navbar start -------------------------- -->
<?php

require_once("includes/navbar.php");

?>
    
    <!-- -------------------------- navbar end -------------------------- -->

 <!---->

<?php 
$query = "SELECT category FROM products WHERE id = '$pid'";
$result = mysqli_query($con, $query);
$cat_id_result = mysqli_fetch_array($result);
$cat_id = $cat_id_result['category'];
$query2 = "SELECT categoryName FROM category WHERE id = '$cat_id'";
$result2 = mysqli_query($con, $query2);
$cat_id_result2 = mysqli_fetch_array($result2);

?>
 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3><?php echo $cat_id_result2['categoryName'] ?></h3>
		<h4><a href="index.php">Home</a><label>/</label><?php echo $cat_id_result2['categoryName'] ?></h4>
		<div class="clearfix"> </div>
	</div>
</div>

<!-- ---------------------------------- start product fetching ---------------------------------- -->

<?php
	$query = "select * from products where id = '$pid'";
	$result = mysqli_query($con, $query);
	if(!$result){
		echo "connection Failed ". mysqli_error($con);
	}
	while($row = mysqli_fetch_array($result)){

	# getting value of category and subcategory of product

	$subCategory = $row['subCategory'];
	$category = $row['category'];
?>
		<div class="single">
			<div class="container">
						<div class="single-top-main" style="margin-top:-50px !important">
	   		<div class="col-md-5 single-top">
	   		<div class="single-w3agile">
							
<div id="picture-frame">
			<img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" data-src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" alt="" height="400px" id="mainImage"/>
		</div>
										<script src="js/jquery.zoomtoo.js"></script>
								<script>
			$(function() {
				$("#picture-frame").zoomToo({
					magnify: 1
				});
			});
		</script>
		

		
			</div>

			<div class="row mx-auto" style="margin-top: 10px; border:1px solid lightgrey; padding: 10px 0px; margin: 5px 1px;">
<div class="col-xs-4"><img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage3']);?>" width="50px" onclick="changeImage(this)" style="cursor:pointer;"></div>
<div class="col-xs-4"><img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage2']);?>" width="50px" onclick="changeImage(this)" style="cursor:pointer;"></div>
<div class="col-xs-4"><img src="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>" width="50px" onclick="changeImage(this)" style="cursor:pointer;"></div>

</div>

			</div>
			<div class="col-md-7 single-top-left ">
								<div class="single-right">
				<h3><?php echo htmlentities($row['productName']); ?></h3>
				
					
				 <div class="pr-single">
				  <p class="reduced "><del>$<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></del>$<?php echo htmlentities($row['productPrice']); ?></p>
				</div>
				<div class="block block-w3">
					<div class="starbox small ghosting"> </div>
				</div>
				<p class="in-pa"><?php echo $row['productDescription']; ?></p>
			   	
				<ul class="social-top">
					<li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
				</ul>
					<div class="add add-3">
					   <button class="btn btn-danger my-cart-btn my-cart-b" data-id="<?php echo htmlentities($row['id']);?>" data-name="<?php echo htmlentities($row['productName']);?>" data-summary="<?php echo htmlentities($row['productDescription']); ?>" data-price="<?php echo htmlentities($row['productPrice']);?>" data-quantity="1" data-image="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>">
					   	<a style="text-decoration: none; padding: 30px 20px;" class="btn-hover-manual" href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>">Add to Cart</a>
					   </button>

					</div>
				
				 
			   
			<div class="clearfix"> </div>
			</div>
		 

			</div>
		   <div class="clearfix"> </div>
	   </div>	
				 
				
	</div>
</div>


<?php } ?>
<!-- ---------------------------------- end product fetching ---------------------------------- -->


		<!---->
<div class="content-top offer-w3agile">
	<div class="container ">
			<div class="spec ">
				<h3>Related Products</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
						<div class=" con-w3l wthree-of">


	<!-- -------------------------------- start related products selected from same subcategory or category -------------------------------- -->
<?php

	$exist_subcategory = 0;

	$query = "SELECT * FROM products WHERE subCategory = '$subCategory' LIMIT 12";
	$result_check = mysqli_query($con, $query);
	$num = mysqli_num_rows($result_check);

	if($num>1){
		$query = $query;
		$exist_subcategory = 1;
	} else {
		$query = "SELECT * FROM products WHERE category = '$category' LIMIT 12";
		$exist_subcategory = 0;
	}
	$result = mysqli_query($con, $query);
	if(!$result){
		echo "connection Failed ". mysqli_error($con);
	}
	while($row = mysqli_fetch_array($result)){
		if($row['id']==$pid){
			#do nothing
		} else{
			

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
								<p ><label>$<?php echo htmlentities($row['productPriceBeforeDiscount']);?></label><em class="item_price">$<?php echo htmlentities($row['productPrice']);?></em></p>
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

<?php } }?>
	<!-- -------------------------------- end related products selected from same subcategory or category -------------------------------- -->


							<div class="clearfix"></div>
						 </div>
					</div>
				</div>
<!--footer-->

    <!-- -------------------------- footer start -------------------------- -->
<?php

require_once("includes/footer.php");

?>
    
    <!-- -------------------------- footer end -------------------------- -->


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


	<!-- -------------------------------- start modals related products selected from same subcategory or category -------------------------------- -->

<?php

	if($exist_subcategory == 1){
		$query = "SELECT * FROM products WHERE subCategory = '$subCategory' LIMIT 12";
	} else {
		$query = "SELECT * FROM products WHERE category = '$category' LIMIT 12";
	}
	$result = mysqli_query($con, $query);
	if(!$result){
		echo "connection Failed ". mysqli_error($con);
	}
	while($row = mysqli_fetch_array($result)){
		if($row['id']==$pid){
			#do nothing
		} else{

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
									  <span class="reducedfrom "><del>$<?php echo htmlentities($row['productPriceBeforeDiscount']);?> </del> $<?php echo htmlentities($row['productPrice']);?>PKR</span>
									
									 <div class="clearfix"></div>
									</div>
									<h4 class="quick">Quick Overview:</h4>
									<p class="quick_desc"><?php echo $row['productDescription'];?></p>
									<div class="add-to">
										<button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="<?php echo htmlentities($row['id']);?>" data-name="<?php echo htmlentities($row['productName']);?>" data-summary="summary 4" data-price="<?php echo htmlentities($row['productPrice']);?>" data-quantity="1" data-image="admin/productimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['productImage1']);?>">
											<a style="text-decoration: none; padding: 30px 20px;" class="btn-hover-manual" href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>">Add to Cart</a>
										</button>
									</div>
								</div>

								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
<?php } } ?>

<!-- -------------------------------- end modals related products selected from same subcategory or category -------------------------------- -->

</body>
</html>

<?php 
} else{
	header('location: index.php');
} 
?>