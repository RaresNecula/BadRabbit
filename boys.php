<?php 
include ('header.php');
?>


<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro padding-y-sm">
  <div class="container">
  
    <div class="intro-banner-wrap text-center">
        <img src="images/boys_shop_official.jpg" class="img-fluid rounded">
    </div>
  
  </div> <!-- container ends//  -->
</section> <!-- section- intro ends// -->
 <!-- ========================= SECTION INTRO END// ========================= -->


<!-- ============================ COMPONENTS ================================= -->
 <section class="section-content padding-y bg">
    <div class="container">
        <div class="row">
            <?php
            // select products from category
            $sql_query = "select * from products where category_id =2"; 
            $result = mysqli_query($con,$sql_query);
       
            if (mysqli_num_rows($result) > 0) { 
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
    
            ?>

                <div class="col-md-4">
                    <figure class="card card-product-grid card-lg">
                        <div class="img-wrap"><img src="<?php echo $row['image_link'] ?>"></div>
                        <figcaption class="info-wrap">
                                <a class="title"><?php echo $row['product_name'] ?></a>
                                <p class="text-muted"><?php echo $row['short_desc'] ?></p>
                        </figcaption>
                        <div class="bottom-wrap">
                            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal<?php echo $row['id'] ?>">Details</a>
                            <ul class="rating-stars">
                                <li style="width:80%" class="stars-active"> 
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </li>
                                <li>
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
                                </li>
                            </ul>	
                            <div class="price-wrap">
                                <span class="price">£<?php echo $row['price'] ?></span>
                            </div> <!-- price-wrap ends// -->
                        </div> <!-- bottom-wrap ends// -->
                    </figure>
                </div> <!-- col ends// -->
            <?php
            }
            } 
            ?>
        </div> <!-- row.// -->
    </div> <!-- container ends//  -->
</section> <!-- section- content ends// -->
<!-- ========================= SECTION CONTENT END// ========================= -->

<?php

$sql_query = "select * from products where category_id =2";
       $result = mysqli_query($con,$sql_query);
       
       
if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
   
 ?>
 
<!-- Modal -->
<div id="myModal<?php echo $row['id'] ?>" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static">
                <div class="modal-dialog modal-xl">
                <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
        <!-- Modal content-->
        <div class="card">
                            <div class="row no-gutters">
                                <aside class="col-md-6">
                                    <article class="gallery-wrap"> 
                                        <div class="img-big-wrap">
                                            <a href="#"><img class="img-rounded" style="max-height=500px; max-width:550px;" src="<?php echo $row['image_link'] ?>"></a>
                                            </div> <!-- img-big-wrap.// -->
                                            <div class="thumbs-wrap">
                                              
                                                <a href="#" class="item-thumb"> <img style="height:100px; width:100px;" src="<?php echo $row['image_link2'] ?>"></a>
                                                <a href="#" class="item-thumb"> <img style="height:100px; width:100px;" src="<?php echo $row['image_link3'] ?>"></a>
                                                <a href="#" class="item-thumb"> <img style="height:100px; width:100px;" src="<?php echo $row['image_link4'] ?>"></a>

                                                
                                            </div> <!-- thumbs-wrap.// -->
                                    </article> <!-- gallery-wrap .end// -->
                                </aside> <!-- col-md-6. end//-->
                                <main class="col-md-6 border-left">
                                    <article class="content-body">
                                        <h2 class="title"><?php echo $row['product_name'] ?></h2>
                                        <div class="rating-wrap my-3">
                                            <ul class="rating-stars">
                                                <li style="width:80%" class="stars-active">
                                                    <img src="images/icons/stars-active.svg" alt="">
                                                </li>
                                                <li>
                                                    <img src="images/icons/starts-disable.svg" alt="">
                                                </li>
                                            </ul>
                                            <small class="label-rating text-muted">0 reviews</small>
                                            <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 0 orders </small>
                                        </div> <!-- rating-wrap.// -->
                                        <div class="mb-3"> 
                                            <var class="price h4">£ 35.00</var>  
                                        </div> <!-- mb-3.// -->

                                        <p><?php echo $row['long_desc'] ?></p>

                                        <dl class="row">

                                            <dt class="col-sm-3">Color</dt>
                                            <dd class="col-sm-9">White</dd>

                                            <dt class="col-sm-3">Delivery</dt>
                                            <dd class="col-sm-9">Europe </dd>
                                        </dl>

                                        <hr>
                                        <div class="row">
                                            <div class="form-group col-md flex-grow-0">
                                                <label>Quantity</label>
                                                <div class="input-group mb-3 input-spinner">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-light" type="button" id="button-plus"> + </button>
                                                    </div>
                                                        <input type="text" class="form-control" value="1">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
                                                            </div>
                                                    </div>
                                                </div> <!-- input-group mb-3 input-spinner.// -->
                                                <div class="form-group col-md">
                                                    <label>Select size</label>
                                                    <div class="mt-0">
                                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                            <label class="btn btn-light">
                                                                <input type="radio" name="radio_size"> S
                                                            </label>
                                                            <label class="btn btn-light active">
                                                                <input type="radio" name="radio_size" checked> M
                                                            </label>
                                                            <label class="btn btn-light">
                                                                <input type="radio" name="radio_size"> L
                                                            </label>
                                                            <label class="btn btn-light">
                                                                <input type="radio" name="radio_size"> XL
                                                            </label>
                                                        </div> 
                                                    </div>
                                                    
                                                </div> <!-- form-group col-md.// -->

                                                



                                                            


                                            </div> <!-- form-group col-md flex-grow-0.// -->
                                            <a href="#" class="btn  btn-primary" data-dismiss="modal" >Close</a>
                                        <a href="?add_to_cart&sku=<?php echo $row['sku'] ?>" class="btn  btn-outline-primary"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>  </a>
                                        </div> <!-- row.// -->
                                        
                                    </article> <!-- content-body .// -->
                                </main> <!-- col-md-6 border-left.// -->
                            </div> <!-- row no-gutters.// -->
                        </div> <!-- card.// -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
                    
                </div>
    </div>
<!-- Modal end.// -->

<?php
}
} 
?>