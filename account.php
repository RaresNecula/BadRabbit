<?php 
include ('header.php');
?>

<section class="section-content padding-y bg">
<div class="container">

<!-- =========================  COMPONENT MYORDER 1 ========================= --> 
<div class="row">
	<aside class="col-md-3">
		<!--   SIDEBAR   -->
		<ul class="list-group">
		<a class="list-group-item active" href="account.php"> My order history </a>
			<a class="list-group-item " href="my_transactions.php"> My Transactions </a>
			<a class="list-group-item" href="settings.php">Settings </a>
			
		</ul>
		<br>
		<a class="btn btn-light btn-block" href="?action=logout"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a> 
		<!--   SIDEBAR .//END   -->
	</aside>
	<main class="col-md-9">

	<?php
	//select orders for each user
	$id =$_SESSION['id'];
	$sql_query = "select * from orders where user_id = $id";
    $result = mysqli_query($con,$sql_query);
       
       
if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
   
 ?>
 
		<article class="card">
		<header class="card-header">
			<strong class="d-inline-block mr-3">Order ID: <?php echo $row['id'];?>6123456789</strong>
			<span>Order Date: <?php echo $row['order_date'];?></span>
		</header>
		<div class="card-body">
			<div class="row"> 
				<div class="col-md-8">
					<h6 class="text-muted">Delivery to</h6>
					<p><?php echo $row['first_name'];?> <?php echo $row['last_name'];?> <br>  
					Phone <?php echo $row['phone'];?> Email: <?php echo $row['email'];?> <br>
			    	<?php echo $row['address2'];?> <br> 
					<?php echo $row['postcode'];?> <br> 
					<?php echo $row['city'];?> <br> 
			    	
			 		</p>
				</div>
				<div class="col-md-4">
					<h6 class="text-muted">Payment</h6>
					<span class="text-success">
						<i class="fab fa-lg fa-cc-visa"></i>
					    Visa  **** 4216  
					</span>
					<p>
					<!-- Subtotal: $356 <br> -->
					 Shipping fee:  FREE <br> 
					 <!-- <span class="b">Total:  $456 </span> -->
					</p>
				</div>
			</div> <!-- row.// -->
		</div> <!-- card-body .// -->
		<?php $ids = unserialize($row['products_id']);?> <br> 
		<div class="table-responsive">
		<table class="table table-hover">
		<?php
		//display all the products from the order
		foreach($ids as $id){	
		$sql_query = "select * from products where id = $id";
		$result = mysqli_query($con,$sql_query);
		
		
 if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
	
  ?>
		
			<tr>
				<td width="65">
					<img src="<?php echo $row['image_link'];?>" class="img-xs border">
				</td>
				<td> 
					<p class="title mb-0"><?php echo $row['product_name'];?></p>
					<var class="price text-muted">GBP <?php echo $row['price'];?></var>
				</td>
				<td> BadRabbit <br>  clothing </td>
				<td width="250"> <a href="#" class="btn btn-outline-primary">Track order</a> <a href="#" class="btn btn-light"> Details </a> </td>
			</tr>

			<?php } } } ?>
		</table>
		</div> <!-- table-responsive .end// -->
		</article> <!-- order-group.// --> 

		<?php } } ?>
	</main>
</div> <!-- row.// -->
<!-- =========================  COMPONENT MYORDER 1 END.// ========================= --> 


</div> <!-- container .//  -->
</section>