<?php

require 'connect.php';

$id = $_POST['id'];
$updatequery = "UPDATE doctor_table SET is_delete ='true' WHERE id='$id'";
$query = mysqli_query($conn, $updatequery);
if($query) {
	echo 1;
} else {
	echo 0;
}
mysqli_close($conn);

?>