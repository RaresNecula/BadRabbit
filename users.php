<?php 
include ('header_dashboard.php');

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'delete' &&  isset($_REQUEST["id"]) && $_REQUEST["id"] != '') 
{

	$id = $_REQUEST['id'];
	$sql = "DELETE FROM users WHERE id=$id";
	if (mysqli_query($con, $sql)) {
	  $success_message = "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . mysqli_error($conn);
	}

}

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'is_admin' &&  isset($_REQUEST["id"]) && $_REQUEST["id"] != '') 
{

	$id = $_REQUEST['id'];
	$sql = "UPDATE users SET is_admin='Y' WHERE id=$id";
	if (mysqli_query($con, $sql)) {
	  $success_message = "Record update successfully";
	} else {
	  echo "Error updating record: " . mysqli_error($conn);
	}

}

if ( isset($_REQUEST["action"]) && $_REQUEST["action"] == 'is_user' &&  isset($_REQUEST["id"]) && $_REQUEST["id"] != '') 
{

	$id = $_REQUEST['id'];
	$sql = "UPDATE users SET is_admin='N' WHERE id=$id";
	if (mysqli_query($con, $sql)) {
	  $success_message = "Record update successfully";
	} else {
	  echo "Error updating record: " . mysqli_error($conn);
	}

}

?>

<div class="container">
<h1>Users</h1>

<table class="table table-hover">
		<th>Id</th>
		<th>First name</th>
		<th>Last name</th>
		<th>Email</th>
		<th>Is admin</th>
		<th>Delete</th>
		<th>Set Admin</th>
		<th>Set User</th>
		<th></th>
		<?php
 		$sql_query = "select * from users";
        $result = mysqli_query($con,$sql_query);
        
        
if (mysqli_num_rows($result) > 0) {
  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>
		<td> " . $row['id']."</td>
	    <td> " . $row["first_name"].  "</td>
	   	<td> " . $row["last_name"].  "</td>
	   	<td> " . $row["email"].  "</td>
		<td> " . $row["is_admin"].  "</td>
	    <td><a href='?action=delete&id=".$row['id']."'>Delete</a></td>
		<td><a href='?action=is_admin&id=".$row['id']."'>Set Admin</a></td>
		<td><a href='?action=is_user&id=".$row['id']."'>Set User</a></td>";

	  }
	}      

		 ?>
		</table>



</div>