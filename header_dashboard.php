<?php
session_start();
include "config.php";



//logout

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'logout') 
{
  $_SESSION = array(); 
  session_destroy();
  echo "<meta http-equiv='Refresh' content='0; url=index.php'>"; 
  exit;
}



if ( isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 'Y') 
{


?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<title>BadRabbit</title>

<!-- jQuery -->
<script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Fonticons -->
<link href="fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
<link href="fonts/feathericons/css/iconfont.css" rel="stylesheet" type="text/css" />
<link href="fonts/material-icons/css/materialdesignicons.css" rel="stylesheet" type="text/css" />

<!-- custom style -->
<link href="css/ui.css" rel="stylesheet" type="text/css"/>
<link href="css/responsive.css" rel="stylesheet" />

<!-- custom javascript -->
<script src="js/script.js" type="text/javascript"></script>


</head>


<body>
    
    

    <!--section header-->


<header class="section-header">

    


<!--Section header-main-->
    


<section class="header-main border-bottom">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-3 col-md-2 col-sm-4 ">
				<a href="index.php" class="brand-wrap">
					<img class="logo" src="images\logo_orizontal.jpg">
        </a> <!-- brand-wrap.// -->
        <a href="?action=logout" class="btn btn-dark">Logout</a>
			</div>
			
			<div class="col-9 col-sm-0 col-lg-4 order-2 order-lg-3">
				<div class="d-flex justify-content-end mb-3 mb-lg-0">
					<div class="widget-header dropdown">

              <?php if(isset($_SESSION['first_name'])) {
                ?>
              <h3><?php echo "Hello Admin  -  " .$_SESSION['first_name']; ?></h3>
                <?php } else {?>
                        <a href="" data-toggle="dropdown" data-offset="20,10">
                            <div class="icontext">
                                <div class="text">
                                    <small class="text-muted">Sign in | Register</small>
                                    <div>My account <i class="fa fa-caret-down"></i> </div>
                                </div>
                                <div class="icon">
                                    <i class="icon-sm rounded-circle border fa fa-user"></i>
                                </div>
                                 
                            </div>
                            
                            
                        </a>

                      <?php } ?>
                      

                        <div class="dropdown-menu dropdown-menu-right">
                            <form class="px-4 py-3" method="POST">
                                <div class="form-group">
                                  <label>Email address</label>
                                  <input type="email" class="form-control" placeholder="email@example.com" name="email">
                                </div>
                                <div class="form-group">
                                  <label>Password</label>
                                  <input type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <button type="submit" name="but_submit" class="btn btn-dark">Sign in</button>
                                </form>
                                <hr class="dropdown-divider">
                                <a class="dropdown-item" href="register.php">No account? Register here!</a>
                                <a class="dropdown-item" href="#">Forgot password?</a>
                        </div> <!--  dropdown-menu .// -->
                    </div>  <!-- widget-header .// -->
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->


<!--Section navbar-->

<nav class="navbar navbar-main navbar-expand-lg border-bottom">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav3" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main_nav3">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link pl-0" href="index_dashboard.php"> <strong>Dashboard</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categories.php">Category</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="create_product.php">Create Product</a>
              <a class="dropdown-item" href="products.php">See Products</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Under Construction</a>
              <a class="dropdown-item" href="#">Under Construction</a>
              <a class="dropdown-item" href="#">Under Construction</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="colors.php">Colors</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sizes.php">Sizes</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Orders</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="Orders.php">Orders</a>
              <a class="dropdown-item" href="#">Pending</a>
              <a class="dropdown-item" href="#">Shipped</a>
              <a class="dropdown-item" href="#">Returns</a>
              <a class="dropdown-item" href="#">Refunds</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Stock</a>
            
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="Users.php">Users list</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Messages</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Reviews</a>
          </li>
        </ul>
      </div> <!-- collapse .// -->
    </div> <!-- container .// -->
  </nav> <!-- navbar main end.// -->

<?php 
}
?>