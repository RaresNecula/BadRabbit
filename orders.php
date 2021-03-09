<?php 
include ('header_dashboard.php');

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'delete' &&  isset($_REQUEST["id"]) && $_REQUEST["id"] != '') 
{

	$id = $_REQUEST['id'];
	$sql = "DELETE FROM orders WHERE id=$id";
	if (mysqli_query($con, $sql)) {
	  $success_message = "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}

}



?>

<div class="container">
<h1>Orders</h1>

<table class="table table-hover">
		
		<th>First name</th>
		<th>Last name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Address 1</th>
		<th>Address 2</th>
		<th>Postcode</th>
		<th>City</th>
		<th>Country</th>
		<th>Payment Type</th>
		<th>Order date</th>
		<th>UserID/Guest</th>
		<th></th>
		<th></th>
		<?php
 		$sql_query = "select * from orders";
        $result = mysqli_query($con,$sql_query);
        
        
if (mysqli_num_rows($result) > 0) {
  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
	    $table= "<tr>
	    <td> " . $row["first_name"].  "</td>
	   	<td> " . $row["last_name"].  "</td>
	   	<td> " . $row["email"].  "</td>
	   	<td> " . $row["phone"].  "</td>
	   	<td> " . $row["address1"].  "</td>
	   	<td> " . $row["address2"].  "</td>
	   	<td> " . $row["postcode"].  "</td>
	   	<td> " . $row["city"].  "</td>
	   	<td> " . $row["country"].  "</td>
	   	<td> " . $row["payment_type"].  "</td>
	   	<td> " . $row["order_date"].  "</td>
	   	<td> " . $row["user_id"].  "</td>

	    <td><a href='?action=delete&id=".$row['id']."'>Delete</a></td>
	    <td><a href='see_ordered_products?id=".$row['id']."'>See Products</a></td>
	    </tr>";

	    

				echo $table;
			}
	}      

		 ?>
		</table>



</div>