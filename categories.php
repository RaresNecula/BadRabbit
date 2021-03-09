<?php 
include ('header_dashboard.php');

$error_message = "";
$success_message = "";

// Register Category
if(isset($_POST['btn_create_category'])){
   $category = trim($_POST['category']);
  

   $isValid = true;

   // Check fields are empty or not
   if($category == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

  
   if($isValid){

     // Check if Category already exists
     $stmt = $con->prepare("SELECT * FROM categories WHERE category = ?");
     $stmt->bind_param("s", $category);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Category is already existed.";
     }

   }

   // Insert records
    if($isValid){
     $insertSQL = "INSERT INTO categories (category) values(?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("s",$category);
     $stmt->execute();
     $stmt->close();


     $success_message = "Category created successfully.";
   }
}

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'delete' &&  isset($_REQUEST["id"]) && $_REQUEST["id"] != '') 
{

	$id = $_REQUEST['id'];
	$sql = "DELETE FROM categories WHERE id=$id";
	if (mysqli_query($con, $sql)) {
	  $success_message = "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}

}
?>







<div class="container">
	<h1>Categories</h1>
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
            // Display error message
            if(!empty($error_message)){
            ?>
            <div class="alert alert-success">
              <strong>Error!</strong> <?= $error_message ?>
            </div>

            <?php
            }
            ?>
<form action="categories.php" method="POST">
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Category</label>
                              <input name="category" type="text" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                        
                    </div> <!-- form-row end.// -->
                   
                    
                    <div class="form-group">
                        <button type="submit" name="btn_create_category" class="btn btn-dark btn-block"> Create Category  </button>
                    </div> <!-- form-group// -->      
                            
                </form>

</div>

<div class="col-md-6">
	<table class="table table-hover">
		<th>Id</th>
		<th>Name of category</th>
		<th></th>
		<?php

 $sql_query = "select * from categories";
        $result = mysqli_query($con,$sql_query);
        
        
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row['id']."</td><td> " . $row["category"].  "</td><td><a href='?action=delete&id=".$row['id']."'>Delete</a></td></tr>";
  }
} 
      

		 ?>
		</table>

</div>


</div>