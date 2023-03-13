	<?php

	require 'connect.php';


	if (isset($_POST['submit'])) {
		$category_id=$_POST['cat_id'];
		$fname=$_POST['sub_name'];
		$status=$_POST['status'];
		$file=$_FILES['sub_image']['name'];
		$temp_file=$_FILES['sub_image']['tmp_name'];
		
		move_uploaded_file($temp_file, "assets/sub-category-file/".$file);
		
		$insertsql="INSERT INTO subcategory_table (cat_id,sub_name,sub_image,status) VALUES ('$category_id','$fname','$file','$status')";
		$query=mysqli_query($conn,$insertsql);

		if ($query) {
			//echo 'insert success';
			header('Location:show_sub_cate.php');
		}
		else{
			echo 'insert not success';
		}
	}



?>