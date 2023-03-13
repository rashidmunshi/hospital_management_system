<?php 
require 'connect.php';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$updatequery = "UPDATE category_table SET deleted_at = 'true' WHERE id = '$id' ";
	$query = mysqli_query($conn, $updatequery);
	$sel = "SELECT * FROM category_table WHERE deleted_at = 'false'";
	$que = mysqli_query($conn, $sel);
	$row = mysqli_fetch_assoc($que);
	if($que) {
		echo 1;
	} else {
		echo 0;
	}
}
mysqli_close($conn);
header("Location: category.php");

?>