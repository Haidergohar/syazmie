<div class="header">

		<div class="container">
			
			<div class="logo">
				<h1 ><a href="index.php" style="color:orange;">ZP SEMBS ENTERPRISE<span style="color:black;">The Best E-Commerce Store</span></a></h1>
			</div>
			<div class="head-t">
				<ul class="card">
					
					<?php
						if(strlen($_SESSION['login'])==0){
					?>

					<li><a href="login.php" ><i class="fa fa-user" aria-hidden="true"></i>Login</a></li>
					<li><a href="register.php" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Register</a></li>
					
					<?php
						} else{
					?>

					<li><a href="my-account.php" ><i class="fa fa-user" aria-hidden="true"></i>My Account</a></li>
					<li><a href="order-history.php" ><i class="fa fa-file-text-o" aria-hidden="true"></i>Order History</a></li>
						
					<?php } ?>


					<?php
						if(strlen($_SESSION['login'])!=0){
					?>

					<li><a href="logout.php" ><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a></li>
					
					<?php } ?>

				</ul>	
			</div>
			
			<div class="header-ri">
				<ul class="social-top">
					<li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
					<li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
				</ul>	
			</div>
		

				<div class="nav-top">
					<nav class="navbar navbar-default">
					
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						

					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav ">
							<li class=" <?php if(isset($home)){ echo $home; unset($home);} ?>"><a href="index.php" class="hyper "><span>Home</span></a></li>	

<?php							
$ret=mysqli_query($con,"select * from category");
while ($row=mysqli_fetch_array($ret)) 
{
	# code...

if($row['id']==$cid){
?>							
							<li class="dropdown <?php if(isset($category)){ echo $category; unset($category);} ?>">
<?php } else{ ?>
						<li class="dropdown ">

<?php }?>
							<a href="category.php?cid=<?php echo $row['id'] ?>" class="dropdown-toggle  hyper" data-toggle="dropdown" ><span><?php echo $row['categoryName']; ?><b class="caret"></b></span></a>
								<ul class="dropdown-menu multi">
									<div class="row">

<!-- first column of subcategory -->

										<div class="col-sm-3">
											<ul class="multi-column-dropdown">

<?php							
$cat = $row['id'];
$ret1=mysqli_query($con,"select * from subcategory where categoryid = '$cat' limit 4");
while ($row1=mysqli_fetch_array($ret1)) 
{
	# code...
?>										
											<li><a href="category.php?cid=<?php echo $row1['categoryid']; ?>&sid=<?php echo $row1['id']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $row1['subcategory']; ?></a></li>
<?php } ?>
										
											</ul>										
										</div>

<!-- second column of subcategory -->

										<div class="col-sm-3">
											<ul class="multi-column-dropdown">

<?php							
$cat = $row['id'];
$ret1=mysqli_query($con,"select * from subcategory where categoryid = '$cat' limit 4,4");
while ($row1=mysqli_fetch_array($ret1)) 
{
	# code...
?>										
											<li><a href="category.php?cid=<?php echo $row1['categoryid']; ?>&sid=<?php echo $row1['id']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $row1['subcategory']; ?></a></li>
<?php } ?>
										
											</ul>										
										</div>

<!-- third column of subcategory -->

										<div class="col-sm-3">
											<ul class="multi-column-dropdown">

<?php							
$cat = $row['id'];
$ret1=mysqli_query($con,"select * from subcategory where categoryid = '$cat' limit 8,4");
while ($row1=mysqli_fetch_array($ret1)) 
{
	# code...
?>										
											<li><a href="category.php?cid=<?php echo $row1['categoryid']; ?>&sid=<?php echo $row1['id']; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $row1['subcategory']; ?></a></li>
<?php } ?>
										
											</ul>										
										</div>



										
										<div class="col-sm-3 w3l">
											<a href="#"><img src="images/me.png" class="img-responsive" alt=""></a>
										</div>
										<div class="clearfix"></div>
									</div>	
								</ul>
							</li>
						
<?php } ?>

							
							<li class=" <?php if(isset($about)){ echo $about; unset($about);} ?>"><a href="about.php" class="hyper"> <span>About Us</span></a></li>
							<li class=" <?php if(isset($contact)){ echo $contact; unset($contact);} ?>"><a href="contact.php" class="hyper"><span>Contact Us</span></a></li>
						</ul>
					</div>
					</nav>
					 <div class="cart" >
					
						<a href="my-cart.php"><span class="fa fa-shopping-cart my-cart-icon">
							<!-- <span class="badge badge-notify my-cart-badge"></span> -->
						</span></a>
					</div>
                    
                    
					<div class="clearfix"></div>
				</div>
					
				</div>			
</div>
  <!---->