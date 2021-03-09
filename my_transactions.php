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
			<a class="list-group-item active" href="my_transactions.php"> My Transactions </a>
			<a class="list-group-item " href="settings.php">Settings </a>
		</ul>
		<br>
		<a class="btn btn-light btn-block" href="?action=logout"> <i class="fa fa-power-off"></i> <span class="text">Log out</span> </a> 
		<!--   SIDEBAR .//END   -->
	</aside>
	<main class="col-md-9">
	<div class="card-body">
<h6>Order ID: 09876545678</h6>
<article class="card">
	<div class="card-body row no-gutters">
		<div class="col">
			<strong>Delivery Estimate time:</strong> <br>16:40, 12 nov 2018
		</div>
		<div class="col">
			<strong>Shipping company:</strong> <br> Fedex, | <i class="fa fa-phone"></i> +123467890
		</div>
		<div class="col">
			<strong>Status:</strong> <br> Picked by the courier
		</div>
		<div class="col">
			<strong>Tracking #:</strong> <br> 98765432123
		</div>
	</div>
</article>

<div class="tracking-wrap">
	<div class="step active">
		<span class="icon"> <i class="fa fa-check"></i> </span>
		<span class="text">Order confirmed</span>
	</div> <!-- step.// -->
	<div class="step active">
		<span class="icon"> <i class="fa fa-user"></i> </span>
		<span class="text"> Picked by courier</span>
	</div> <!-- step.// -->
	<div class="step">
		<span class="icon"> <i class="fa fa-truck"></i> </span>
		<span class="text"> On the way </span>
	</div> <!-- step.// -->
	<div class="step">
		<span class="icon"> <i class="fa fa-box"></i> </span>
		<span class="text">Ready for pickup</span>
	</div> <!-- step.// -->
</div>


<hr>



<p><strong>Note: </strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


	</div>
	</main>
</div> <!-- row.// -->
<!-- =========================  COMPONENT MYORDER 1 END.// ========================= --> 


</div> <!-- container .//  -->
</section>