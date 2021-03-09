<?php 
include ('header_dashboard.php');

$error_message = "";
$success_message = "";

// Register user
if(isset($_POST['btn_create_color'])){
   $color = trim($_POST['color']);
  

   $isValid = true;

   // Check fields are empty or not
   if($color == ''){
     $isValid = false;
     $error_message = "Please fill all fields.";
   }

  
   if($isValid){

     // Check if Email-ID already exists
     $stmt = $con->prepare("SELECT * FROM colors WHERE color_name = ?");
     $stmt->bind_param("s", $color);
     $stmt->execute();
     $result = $stmt->get_result();
     $stmt->close();
     if($result->num_rows > 0){
       $isValid = false;
       $error_message = "Color is already existed.";
     }

   }

   // Insert records
    if($isValid){
     $insertSQL = "INSERT INTO colors (color_name) values(?)";
     $stmt = $con->prepare($insertSQL);
     $stmt->bind_param("s",$color);
     $stmt->execute();
     $stmt->close();


     $success_message = "Color created successfully.";
   }
}

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'delete' &&  isset($_REQUEST["id"]) && $_REQUEST["id"] != '') 
{

	$id = $_REQUEST['id'];
	$sql = "DELETE FROM colors WHERE id=$id";
	if (mysqli_query($con, $sql)) {
	  $success_message = "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}

}
?>







<div class="container">
  <h1>Colors</h1>
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
<form action="colors.php" method="POST">
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Insert new Color</label>
                              <input name="color" type="text" class="form-control" placeholder="">
                        </div> <!-- form-group end.// -->
                        
                    </div> <!-- form-row end.// -->
                   
                    
                    <div class="form-group">
                        <button type="submit" name="btn_create_color" class="btn btn-dark btn-block"> Create Color  </button>
                    </div> <!-- form-group// -->      
                            
                </form>

</div>

<div class="col-md-6">
	<table class="table table-hover">
		<th>Id</th>
		<th>Name of color</th>
    <th></th>
		<?php

 $sql_query = "select * from colors";
        $result = mysqli_query($con,$sql_query);
        
        
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row['id']."</td><td> " . $row["color_name"].  "</td><td><a href='?action=delete&id=".$row['id']."'>Delete</a></td></tr>";
  }
} else {
  echo "0 results";
}

      

		 ?>
		</table>

</div>


</div>