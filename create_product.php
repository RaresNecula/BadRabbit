<?php 
include ('header_dashboard.php');
// cream 2 mesage de success si eroare
$error_message = "";
$success_message = "";
// verificam daca butonul e apasat
if(isset($_POST['btn_create_product'])){
   $product_name = trim($_POST['product_name']);
   $price = trim($_POST['price']);
   $short_desc = trim($_POST['short_desc']);
   $long_desc = trim($_POST['long_desc']);
   $sku = trim($_POST['sku']);
   $category_id = trim($_POST['category_id']);
   $color_id = trim($_POST['color_id']);
   $size_id = trim($_POST['size_id']);

   $isValid = true;

   // Check fields are empty or not
   if($product_name == '' || $price== '' || $short_desc== '' || $long_desc== '' || $sku== ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

  

   // Insert records
    if($isValid){
    	
     $insertSQL = "INSERT INTO products (product_name,price,short_desc,long_desc,sku,category_id,size_id,color_id) values(?,?,?,?,?,?,?,?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("ssssssss",$product_name,$price,$short_desc,$long_desc,$sku,$category_id,$size_id,$color_id);
     $stmt->execute();
     $stmt->close();


     $success_message = "Product created successfully.";
   }
}


?>










<div class="container">

<h1>Create products</h1>
	<div class="col-md-6">
		 <?php 
            // Display Success message
            if(!empty($success_message)){
            ?>
            <div class="alert alert-success">
              <strong>Success!</strong> <?= $success_message ?>
            </div>

            <?php
            }
            ?>


            <?php 
            // Display Success message
            if(!empty($error_message)){
            ?>
            <div class="alert alert-success">
              <strong>Error!</strong> <?= $error_message ?>
            </div>

            <?php
            }
            ?>
<form action="create_product.php" method="POST">
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Prod name</label>
                              <input name="product_name" type="text" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                        
                    </div> 
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Price</label>
                              <input name="price" type="number" class="form-control" placeholder="">
                        </div> 
                        
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Short desc</label>
                              <input name="short_desc" type="text" class="form-control" placeholder="">
                        </div> 
                        
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Long desc</label>
                              <textarea name="long_desc" class="form-control"></textarea>
                        </div> 
                        
                    </div>

                    <div class="form-row">
                        <div class="col form-group">
                            <label>Sku</label>
                              <input name="sku" type="text" class="form-control" placeholder="">
                        </div> 
                        
                    </div>
                    	<!-- Get all categories from database -->
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Category</label>
                              <select name="category_id" class="form-control">
                              		<?php
								 		$sql_query = "select * from categories";
								        $result = mysqli_query($con,$sql_query);
								        	if (mysqli_num_rows($result) > 0) {
											  // output data of each row
												  while($row = mysqli_fetch_assoc($result)) {
												    echo "<option value='".$row['id']."'>" . $row["category"].  "</option>";
												}
											}      

										 ?>
                              	
                              </select>
                        </div> 
                    </div>
                   <div class="form-row">
                        <div class="col form-group">
                            <label>Color</label>
                              <select name="color_id" class="form-control">
                              		<?php
								 		$sql_query = "select * from colors";
								        $result = mysqli_query($con,$sql_query);
								        	if (mysqli_num_rows($result) > 0) {
											  // output data of each row
												  while($row = mysqli_fetch_assoc($result)) {
												    echo "<option value='".$row['id']."'>" . $row["color_name"].  "</option>";
												}
											}      

										 ?>
                              	
                              </select>
                        </div> 
                        
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Size</label>
                              <select name="size_id" class="form-control">
                              		<?php
								 		$sql_query = "select * from sizes";
								        $result = mysqli_query($con,$sql_query);
								        	if (mysqli_num_rows($result) > 0) {
											  // output data of each row
												  while($row = mysqli_fetch_assoc($result)) {
												    echo "<option value='".$row['id']."'>" . $row["size_name"].  "</option>";
												}
											}      

										 ?>
                              	
                              </select>
                        </div> 
                        
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn_create_product" class="btn btn-dark btn-block"> Create Product  </button>
                    </div> <!-- form-group// -->      
                            
                </form>

</div>