<?php 
include ('header.php');

$error_message = "";
$success_message = "";

// daca e apasat butonul de create payment, salveaza toate atributele si le introduce in tabelul orders
if(isset($_POST['btn_create_payment'])){


   $first_name = trim($_POST['first_name']);
   $last_name = trim($_POST['last_name']);
   $phone = trim($_POST['phone']);
   $email = trim($_POST['email']);
   $address1 = trim($_POST['address1']);
   $address2 = trim($_POST['address2']);
   $postcode = trim($_POST['postcode']);
   $city = trim($_POST['city']);
   $country = trim($_POST['country']);
   $payment_type = trim($_POST['payment_method']);
   
  $user_id = 'guest';
   if(isset($_SESSION['id']))
   {

      $user_id = $_SESSION['id'];
    
    }

   
   $skus_array = [];
   if(isset($_SESSION["shopping_cart"])){


    foreach ($_SESSION["shopping_cart"] as $product){

        array_push($skus_array,$product['code']);
    }

  }


   $seralizedArray = serialize($skus_array);







   $isValid = true;

   // Check fields are empty or not
   if($first_name == '' || $last_name== ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

   // Insert records
    if($isValid){
      
     $insertSQL = "INSERT INTO orders (first_name,last_name,phone,email,address1,address2,postcode,city,country,payment_type,user_id,products_id) values(?,?,?,?,?,?,?,?,?,?,?,?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("ssssssssssss",$first_name,$last_name,$phone,$email,$address1,$address2,$postcode,$city,$country,$payment_type,$user_id,$seralizedArray);
     $stmt->execute();
     $stmt->close();


     $success_message = "Order created successfully.";
     $_SESSION = array(); 
      session_destroy();
      echo "<meta http-equiv='Refresh' content='0; url=index.php'>"; 
      exit;
   }
}




?>


<section class="section-content padding-y bg">

<div class="container">



<!-- ============================ COMPONENT 2 ================================= -->
<div class="row">
    <main class="col-md-8">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
<article class="card mb-4">
<div class="card-body">
  <h4 class="card-title mb-4">Review cart</h4>
  <div class="row">
                     <?php 
                foreach ($_SESSION["shopping_cart"] as $product){
                ?>
                <div class="col-md-6">
                  <figure class="itemside  mb-4">
                    <div class="aside"><img src="<?php echo $product["image"]; ?>" class="border img-sm"></div>
                    <figcaption class="info">
                      <p><?php echo $product["name"]; ?></p>
                      <span class="text-muted"><?php echo "$".$product["price"]; ?> </span>
                    </figcaption>
                  </figure>
                </div> <!-- col.// -->
                            <?php
                        $total_price += ($product["price"]*$product["quantity"]);
                        }
                        ?>
                        <?php
                        }else{
                         echo "<h3>Your cart is empty!</h3>";
                         }
                        ?>
    
  </div> <!-- row.// -->
</div> <!-- card-body.// -->
</article> <!-- card.// -->


<article class="card mb-4">
  
<div class="card-body">
  <h4 class="card-title mb-4">Contact info</h4>
  <form action="" method="post">
    <div class="row">
      <div class="form-group col-sm-6">
        <label>Frst name</label>
        <input type="text" placeholder="Type here" name="first_name" class="form-control">
      </div>
      <div class="form-group col-sm-6">
        <label>Last name</label>
        <input type="text" placeholder="Type here" name="last_name" class="form-control">
      </div>
      <div class="form-group col-sm-6">
        <label>Phone</label>
        <input type="text" value="" name="phone" class="form-control">
      </div>
      <div class="form-group col-sm-6">
        <label>Email</label>
        <input type="email" placeholder="example@gmail.com" name="email" class="form-control">
      </div>
    </div> <!-- row.// -->  
  
</div> <!-- card-body.// -->
</article> <!-- card.// -->


<article class="card mb-4">
<div class="card-body">
  <h4 class="card-title mb-4">Delivery info</h4>
  
    <div class="row">
      <div class="form-group col-sm-6">
        <label class="js-check box active">
          <input type="radio" name="dostavka" value="option1" checked>
          <h6 class="title">Delivery</h6>
          <p class="text-muted">We will deliver by DHL Kargo</p>
        </label> <!-- js-check.// -->
      </div>
      
    </div> <!-- row.// -->
      

    <div class="row">
               
        <div class="form-group col-sm-9">
          <label>Address line 1*</label>
          <input type="text" placeholder="Type here" name="address1" class="form-control">
        </div>
        <div class="form-group col-sm-9">
          <label>Address line 2*</label>
          <input type="text" placeholder="Type here" name="address2" class="form-control">
        </div>
        <div class="form-group col-sm-4">
          <label>Postal code</label>
          <input type="text" placeholder="" name="postcode" class="form-control">
        </div>
        <div class="form-group col-sm-4">
          <label>City</label>
          <input type="text" placeholder="" name="city" class="form-control">
        </div>
        <div class="form-group col-sm-4">
          <label>Country</label>
          <input type="text" placeholder="" name="country" class="form-control">
        </div>

  <input type="hidden" name="payment_method" value="PayPal">

    </div> <!-- row.// -->  

</div> <!-- card-body.// -->
</article> <!-- card.// -->
<article class="accordion" id="accordion_pay">
  <div class="card">
    <header class="card-header">
      <img src="../images/misc/payment-paypal.png" class="float-right" height="24"> 
      <label class="form-check collapsed" data-toggle="collapse" data-target="#pay_paynet">
        <input class="form-check-input" name="payment-option" checked type="radio" value="option2">
        <h6 class="form-check-label"> 
          Paypal 
        </h6>
      </label>
    </header>
    <div id="pay_paynet" class="collapse show" data-parent="#accordion_pay">
    <div class="card-body">
      <p class="text-center text-muted">Connect your PayPal account and use it to pay your bills. You'll be redirected to PayPal to add your billing information.</p>
      <p class="text-center">
        <a href="#"><img src="../images/misc/btn-paypal.png" height="32"></a>
        <br><br>
      </p>
    </div> <!-- card body .// -->
    </div> <!-- collapse .// -->
  </div> <!-- card.// -->
  <div class="card">
  <header class="card-header">
    <img src="../images/misc/payment-card.png" class="float-right" height="24">  
    <label class="form-check" data-toggle="collapse" data-target="#pay_payme">
      <input class="form-check-input" name="payment-option" type="radio" value="option2">
      <h6 class="form-check-label"> Credit Card  </h6>
    </label>
  </header>
  <div id="pay_payme" class="collapse" data-parent="#accordion_pay">
    <div class="card-body">
      <p class="alert alert-success">Some information or instruction</p>
    
    </div> <!-- card body .// -->
  </div> <!-- collapse .// -->
  </div> <!-- card.// -->
  <div class="card">
    <header class="card-header">
      <img src="../images/misc/payment-bank.png" class="float-right" height="24">  
      <label class="form-check" data-toggle="collapse" data-target="#pay_card">
        <input class="form-check-input" name="payment-option" type="radio" value="option1">
        <h6 class="form-check-label"> Bank Transfer </h6>
      </label>
    </header>
    <div id="pay_card" class="collapse" data-parent="#accordion_pay">
      <div class="card-body">
        <p class="text-muted">Some instructions about how to pay </p>
        <p>
          Bank of America, Account number: 12345678912346 <br>
          IBAN: 12345, SWIFT: 987654
        </p>
      </div> <!-- card body .// -->
    </div> <!-- collapse .// -->
    <input type="submit" class="btn btn-primary btn-block" name="btn_create_payment" value="Pay">
  </form>
  </div> <!-- card.// -->
</article> 
<!-- accordion end.// -->
  
    </main> <!-- col.// -->
    <aside class="col-md-4">
      <div class="card shadow">
      <div class="card-body">
        <h4 class="mb-3">Overview</h4>
        <dl class="dlist-align">
          <dt class="text-muted">Delivery:</dt>
          <dd>Delivery</dd>
          </dl>
        <dl class="dlist-align">
          <dt class="text-muted">Delivery type:</dt>
          <dd>DHL Kargo</dd>
        </dl>
        <dl class="dlist-align">
          <dt class="text-muted">Payment method:</dt>
          <dd>PayPal</dd>
        </dl>
        <hr>
        <dl class="dlist-align">
          <dt>Total:</dt>
          <dd class="h5"><?php if(isset($_SESSION["shopping_cart"])){ echo "$".$total_price;} ?></dd>
        </dl>
        <hr>
        <p class="small mb-3 text-muted">By clicking you are agree with terms of condition </p>
        
        
      </div> <!-- card-body.// -->
      </div> <!-- card.// -->
    </aside> <!-- col.// -->
  </div> <!-- row.// -->

<!-- ============================ COMPONENT 2 END//  ================================= -->




</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->



<?php
include ('footer.php');
?>