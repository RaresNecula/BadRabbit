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
			<a class="list-group-item " href="account.php"> My order history </a>
			<a class="list-group-item " href="my_transactions.php"> My Transactions </a>
			<a class="list-group-item active" href="settings.php">Settings </a>
		</ul>
		<br>
		<a class="btn btn-light btn-block" href="?action=logout"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a> 
		<!--   SIDEBAR .//END   -->
	</aside>
	<main class="col-md-9">
		<article class="card">
		
		<div class="card-body">
			<div class="row"> 
				<div class="col-md-8">
					<h6 class="text-muted">User details</h6>
					<p><?php if(isset($_SESSION['first_name'])) {
                ?>
              <h3></h3>
				
				<br>  
					<p>
					<!-- display account details -->
					<?php echo "Username : " .$_SESSION['first_name']; ?> <br>
					<?php echo "Email : " .$_SESSION['email']; ?>
			 		</p>

					 <?php } ?>
				</div>
				
			</div> <!-- row.// -->
		</div> <!-- card-body .// -->
		<div class="table-responsive">
		
		</div> <!-- table-responsive .end// -->
		</article> <!-- order-group.// --> 
	</main>
</div> <!-- row.// -->
<!-- =========================  COMPONENT MYORDER 1 END.// ========================= --> 


</div> <!-- container .//  -->
</section>