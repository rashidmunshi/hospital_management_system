<?php
require 'connect.php';

if (isset($_POST['submit'])) {
	$name=$_POST['name'];
	$file=$_FILES['image']['name'];
	$temp_file=$_FILES['image']['tmp_name'];
	$status=$_POST['status'];
	move_uploaded_file($temp_file, "assets/file-upload/".$file);
	if ($status == 0) {
		$val = 0;
	}
	else{
		$val = 1;
	}
	$insertsql="INSERT INTO category_table (name,image,status) VALUES ('$name','$file','$val')";
	$query=mysqli_query($conn,$insertsql);
	if ($query) {
		header('Location:category.php');
	}
	else{
		echo 'insert not success';
	}
}
?>