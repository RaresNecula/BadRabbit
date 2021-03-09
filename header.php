<?php
session_start();  
include "config.php";  //establish connection with database

if(isset($_POST['but_submit'])){  //verify submit button
    $email = mysqli_real_escape_string($con,$_POST['email']);   //excape funtion for special characters
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($email != "" && $password != ""){     //verify is email and passowrd contain values

        $sql_query = "select *, count(*) as cntUser from users where email='".$email."' and password='".$password."'"; 
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];


        if($count > 0){     //is user exists, populate fields with atributes
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['is_admin'] = $row['is_admin'];
            $_SESSION['id'] = $row['id'];

            if ( isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] == 'Y')   //verify admin and redirect to dasboard or main page
            {
              
              header('Location: index_dashboard.php');
            }else {

              header('Location: index.php');
            }

        }else{
            echo "Invalid username and password";
        }

    }

}

//logout

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'logout') 
{
  $_SESSION = array(); 
  session_destroy();
  echo "<meta http-equiv='Refresh' content='0; url=index.php'>"; 
  exit;
}





$status="";
if (isset($_REQUEST['add_to_cart']) && isset($_REQUEST['sku']) ){  
$code = $_REQUEST['sku'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `sku`='$code'"
);
$row = mysqli_fetch_assoc($result);    
$name = $row['product_name'];
$code = $row['sku'];
$price = $row['price'];
$colorid = $row['color_id'];
$sizeid = $row['size_id'];
$result = mysqli_query(
$con,
"SELECT * FROM `colors` WHERE `id`='$colorid'"
);
$colorRow = mysqli_fetch_assoc($result);

$result = mysqli_query(
$con,
"SELECT * FROM `sizes` WHERE `id`='$sizeid'"
);
$sizeRow = mysqli_fetch_assoc($result);


$color = $colorRow['color_name'];
$size = $sizeRow['size_name'];
$short_desc = $row['short_desc'];
$image = $row['image_link'];
 
$cartArray = array(          
 $code=>array(
 'name'=>$name,
 'code'=>$code,
 'price'=>$price,
 'quantity'=>1,
 'color' => $color,
 'size' => $size,
 'short_desc' => $short_desc,
 'image'=>$image)
);
 
if(empty($_SESSION["shopping_cart"])) {         
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";  
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";    
 }
 
 }
}

echo $status;

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

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

    <!--Section header - top-->
    <section class="header-top-light border-bottom">
      <div class="container">
        <nav class="navbar navbar-light navbar-expand p-0 ">
          <ul class="nav mr-auto">
            <a class="btn btn-icon btn-light m-2" title="Facebook" target="_blank" href="https://www.facebook.com/badrabbit2020"><i class="fab fa-facebook-f"></i></a>
			<a class="btn btn-icon btn-light m-2" title="Instagram" target="_blank" href="https://www.instagram.com/badrabbit.ro/"><i class="fab fa-instagram"></i></a> 
          </ul>
          <ul class="navbar-nav">
            <a class="nav-link p-3" href="#"> <i class="fa fa-phone"></i> Call us: +44 7983 899555 </a>
            <a class="nav-link p-3" href="https://www.facebook.com/messages/t/badrabbit2020"> <i class="fa fa-comment"></i> Live chat </a>
          </ul> <!-- navbar-nav.// -->
        </nav>
      </div>
    </section>


<!--Section header-main-->
    
<section class="header-main border-bottom">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-2 col-3 col-md-2 col-sm-3 ">
				<a href="index.php" class="brand-wrap">
					<img class="logo" src="images/logo_orizontal.jpg">
				</a> <!-- brand-wrap.// -->
			</div>
			<div class="col-12 col-sm-12 col-md-11 col-lg-6  order-3 order-lg-2">
				<form action="#" class="search">
					<div class="input-group w-100">
						<select class="custom-select"  name="category_name">
                                <option value="">Shop</option>
                                <option value="">Guys</option>
                                <option value="">Girls</option>
                                <option value="">Accessories</option>
                                
						</select>
					    <input type="text" class="form-control" style="width:60%;" placeholder="Search">
					    
					    <div class="input-group-append">
					      <button class="btn btn-dark" type="submit">
					        <i class="fa fa-search"></i>
					      </button>
					    </div>
				    </div>
				</form> <!-- search-wrap end// -->
			</div> <!-- col.// -->
			<div class="col-9 col-sm-0 col-lg-4 order-2 order-lg-3">
				<div class="d-flex justify-content-end mb-3 mb-lg-0">
					<div class="widget-header dropdown">

              <?php if(isset($_SESSION['first_name'])) {
                ?>
              <h3><?php echo "Hello " .$_SESSION['first_name']; ?></h3>
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
                    <a href="#" class="widget-header mr-2">
                        <div class="icon">
                            <i class="icon-sm rounded border fa fa-heart"></i>
                        </div>
                    </a>
					<a href="cart.php" class="widget-header mr-2">
						<div class="icon icon-sm rounded border"><i class="fa fa-shopping-cart"></i></div>
						<span class="badge badge-pill badge-danger notify"><?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));

echo $cart_count;
}else{
  echo "0";
}
?>
  
</span>
					</a>
				</div> <!-- widgets-wrap.// -->
			</div> <!-- col.// -->
		</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->


<!--Section lower-header----navbar-->

<nav class="navbar navbar-main navbar-expand-lg border-bottom">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav3" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main_nav3">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link pl-0" href="index.php"> <strong>BadRabbit's Home</strong></a>
          </li>
          <?php

 $sql_query = "select * from categories";          
        $result = mysqli_query($con,$sql_query);
        
        
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<li class="nav-item">
    <a class="nav-link" href='.$row['category'].'.php>'.$row['category'].'</a>
  </li>';
  }
} 
		 ?>
          
          <li class="nav-item">
            <a class="nav-link" href="#">Sale</a>
          </li>


          <?php if(isset($_SESSION['first_name'])) {
                ?>
             
                
                       


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="account.php">Account details</a>
              <a class="dropdown-item" href="my_transactions.php">Manage Orders</a>

              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Logout</a>
            </div>
          </li>

          <?php } ?>


        </ul>
      </div> <!-- collapse .// -->
    </div> <!-- container .// -->
  </nav> <!-- navbar main end.// -->

