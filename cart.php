<?php 
include ('header.php');


$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){     //verify remove action state

if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
     
      if($_POST["code"] == $value['code']){
     

      unset($_SESSION["shopping_cart"][$key]);   //unset - delete session
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){     //change quantity 
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];  
        break; // Stop the loop after we've found the product
    }
}
   
}

?>

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">

<div class="row">
  <main class="col-md-9">
<div class="card">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200"> </th>
</tr>
</thead>
<tbody>

  <?php 
foreach ($_SESSION["shopping_cart"] as $product){     
?>
<tr>
  <td>
    <figure class="itemside">
      <div class="aside"><img src="<?php echo $product["image"]; ?>" class="img-sm"></div>
      <figcaption class="info">
        <a href="#" class="title text-dark"><?php echo $product["name"]; ?></a>
        <p class="text-muted small">Size: <?php echo $product["size"]; ?>, Color: <?php echo $product["color"]; ?>, <br> Short description: <?php echo $product["short_desc"]; ?></p>
      </figcaption>
    </figure>
  </td>
  <td> 
    <select class="form-control">
      <option>1</option>
      <option>2</option>  
      <option>3</option>  
      <option>4</option>  
    </select> 
  </td>
  <td> 
    <div class="price-wrap"> 
      <var class="price"><?php echo "£".$product["price"]; ?></var> 
      <small class="text-muted">  </small> 
    </div> <!-- price-wrap .// -->
  </td>
  <td class="text-right"> 
  
  <form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove btn btn-light'>Remove Item</button>
</form>
  </td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
</tbody>
</table>
<?php
}else{
 echo "<h3>Your cart is empty!</h3>";
 }
?>
<div class="card-body border-top">
  <a href="order.php" class="btn btn-primary float-md-right"> Make Purchase <i class="fa fa-chevron-right"></i> </a>
  <a href="#" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
</div>  
</div> <!-- card.// -->

<div class="alert alert-success mt-3">
  <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks</p>
</div>

  </main> <!-- col.// -->
  <aside class="col-md-3">
    <div class="card mb-3">
      <div class="card-body">
      <form>
        <div class="form-group">
          <label>Have coupon?</label>
          <div class="input-group">
            <input type="text" class="form-control" name="" placeholder="Coupon code">
            <span class="input-group-append"> 
              <button class="btn btn-primary">Apply</button>
            </span>
          </div>
        </div>
      </form>
      </div> <!-- card-body.// -->
    </div>  <!-- card .// -->
    <div class="card">
      <div class="card-body">
          <dl class="dlist-align">
            <dt>Total price:</dt>
            <dd class="text-right"><?php if(isset($_SESSION["shopping_cart"])){ echo "£".$total_price;} ?></dd>
          </dl>
          <dl class="dlist-align">
            <dt>Discount:</dt>
            <dd class="text-right">0</dd>
          </dl>
          <dl class="dlist-align">
            <dt>Total:</dt>
            <dd class="text-right  h5"><strong><?php if(isset($_SESSION["shopping_cart"])){ echo "£".$total_price;} ?></strong></dd>
          </dl>
          <hr>
          <p class="text-center mb-3">
            <img src="images/misc/payments.png" height="26">
          </p>
          
      </div> <!-- card-body.// -->
    </div>  <!-- card .// -->
  </aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name bg padding-y">
<div class="container">
<h6>Payment and refund policy</h6>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->



<?php
include ('footer.php');
?>