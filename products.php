<?php 
include ('header_dashboard.php');

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'delete' &&  isset($_REQUEST["id"]) && $_REQUEST["id"] != '') 
{

	$id = $_REQUEST['id'];
	$sql = "DELETE FROM products WHERE id=$id";
	if (mysqli_query($con, $sql)) {
	  $success_message = "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}

}

?>

<div class="container">
<h1>Products</h1>

<table class="table table-hover">
		<th>Id</th>
		<th>Name of Product</th>
		<th>Price</th>
		<th>Short desc</th>
		<th>Long desc</th>
		<th>Sku</th>
		<th></th>
		<?php
 		$sql_query = "select * from products";
        $result = mysqli_query($con,$sql_query);
        
        
if (mysqli_num_rows($result) > 0) {
  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
	    echo "<tr><td>".$row['id']."</td>
	    <td> " . $row["product_name"].  "</td>
	   	<td> " . $row["price"].  "</td>
	   	<td> " . $row["short_desc"].  "</td>
	   	<td> " . $row["long_desc"].  "</td>
	   	<td> " . $row["sku"].  "</td>

	    <td><a href='?action=delete&id=".$row['id']."'>Delete</a></td></tr>";
	  }
	}      

		 ?>
		</table>



</div>