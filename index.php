<?php 
include ('header.php');
?>

<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro padding-y-sm">
  <div class="container">
  
  <div class="intro-banner-wrap text-center">
    <img src="images/we're open 2.png" class="img-fluid rounded">
  </div>
  
  </div> <!-- container //  -->
  </section>
  <!-- ========================= SECTION INTRO END// ========================= -->
  
  
  <!-- ========================= SECTION FEATURE ========================= -->
  <section class="section-content padding-y-sm">
  <div class="container">
  <article class="card card-body">
  
  
  <div class="row">
    <div class="col-md-4">	
      <figure class="item-feature">
        <span class="text-dark"><i class="fa fa-2x fa-truck"></i></span>
        <figcaption class="pt-3">
          <h5 class="title">Fast Delivery</h5>
          <p>insert description </p>
        </figcaption>
      </figure> <!-- iconbox // -->
    </div><!-- col // -->
    <div class="col-md-4">
      <figure  class="item-feature">
        <span class="text-dark"><i class="fa fa-2x fa-landmark"></i></span>	
        <figcaption class="pt-3">
          <h5 class="title">Creative Design</h5>
          <p>Insert description
           </p>
        </figcaption>
      </figure> <!-- iconbox // -->
    </div><!-- col // -->
      <div class="col-md-4">
      <figure  class="item-feature">
        <span class="text-dark"><i class="fa fa-2x fa-lock"></i></span>
        <figcaption class="pt-3">
          <h5 class="title">Secured Payment </h5>
          <p>Insert description
           </p>
        </figcaption>
      </figure> <!-- iconbox // -->
    </div> <!-- col // -->
  </div>
  </article>
  
  </div> <!-- container .//  -->
  </section>
  <!-- ========================= SECTION FEATURE END// ========================= -->
  
  

  
  
  
  <!-- ========================= SECTION CONTENT ========================= -->
  <section class="section-content">
    <div class="container">
      <header class="section-heading">
        <h3 class="section-title">New arrived</h3>
        <div class="row">
          <?php

            if (isset($_REQUEST['category']) && $_REQUEST['category'] == "girls"){
              $sql_query = "select * from products where category_id = 1";
              $result = mysqli_query($con,$sql_query);
            }
            elseif (isset($_REQUEST['category']) && $_REQUEST['category'] == "boys"){
              $sql_query = "select * from products where category_id = 2";
              $result = mysqli_query($con,$sql_query);
            }
            else{
              $sql_query = "select * from products";
              $result = mysqli_query($con,$sql_query);
            }

            if (mysqli_num_rows($result) > 0) {
  
              while($row = mysqli_fetch_assoc($result)) {
                echo '
                  <div class="col-md-3">
                    <div href="#" class="card card-product-grid">
                      <a href="#" class="img-wrap"> <img src="'.$row['image_link'].'"> </a>
                      <figcaption class="info-wrap">
                        <a href="#" class="title">'.$row['product_name'].'</a>
                        <div class="price mt-1">£'.$row['price'].'</div>
                        <a href="product.php" class="btn btn-primary float-right">Details</a>
                      </figcaption>
                    </div>
                  </div> ';
              }
            } 
      
          ?>
        </div> <!-- row.// -->
      </header> <!-- section-heading //  -->
    </div> <!-- container //  -->
  </section> <!--section-content //-->
  <!-- ========================= SECTION CONTENT END// ========================= -->
  
  
  
  

<!-- footer start -->
<?php
include ('footer.php');
?>