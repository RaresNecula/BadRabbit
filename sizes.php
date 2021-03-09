<?php 
include ('header_dashboard.php');

$error_message = "";
$success_message = "";

// Register user
if(isset($_POST['btn_create_size'])){
   $size = trim($_POST['size']);
  

   $isValid = true;

   // Check fields are empty or not
   if($size == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

  
   if($isValid){

     // Check if Email-ID already exists
     $stmt = $con->prepare("SELECT * FROM sizes WHERE size_name = ?");
     $stmt->bind_param("s", $size);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Size is already existed.";
     }

   }

   // Insert records
    if($isValid){
     $insertSQL = "INSERT INTO sizes (size_name) values(?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("s",$size);
     $stmt->execute();
     $stmt->close();


     $success_message = "Size created successfully.";
   }
}

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'delete' &&  isset($_REQUEST["id"]) && $_REQUEST["id"] != '') 
{

	$id = $_REQUEST['id'];
	$sql = "DELETE FROM sizes WHERE id=$id";
	if (mysqli_query($con, $sql)) {
	  $success_message = "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}

}
?>







<div class="container">
  <h1>Sizes</h1>
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
<form action="sizes.php" method="POST">
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Insert new Size</label>
                              <input name="size" type="text" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                        
                    </div> <!-- form-row end.// -->
                   
                    
                    <div class="form-group">
                        <button type="submit" name="btn_create_size" class="btn btn-dark btn-block"> Create Size  </button>
                    </div> <!-- form-group// -->      
                            
                </form>

</div>

<div class="col-md-6">
	<table class="table table-hover">
		<th>Id</th>
		<th>Name of size</th>
    <th></th>
		<?php

 $sql_query = "select * from sizes";
        $result = mysqli_query($con,$sql_query);
        
        
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row['id']."</td><td> " . $row["size_name"].  "</td><td><a href='?action=delete&id=".$row['id']."'>Delete</a></td></tr>";
  }
} else {
  echo "0 results";
}

      

		 ?>
		</table>

</div>


</div>