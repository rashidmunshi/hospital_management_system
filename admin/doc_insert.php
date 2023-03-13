<?php
require'connect.php';

$category_id = $_POST['category_id'];
$sql2="SELECT * FROM subcategory_table WHERE cat_id='$category_id'";
$query2=mysqli_query($conn,$sql2);
$output="<option value=''disabled selected>select category</option>";
if (mysqli_num_rows($query2) > 0) {
	while($row=mysqli_fetch_assoc($query2)){
		$output.='<option value="'.$row['id'].'">' .$row['sub_name'].  '</option>';
	}
	echo $output;
}
else{
	echo"<option selected>select sub-categoty </option>";
}
if (isset($_POST['submit'])) {
	$cate_id=$_POST['cat-id'];
	$sub_id=$_POST['sub_category_id'];
	$name=$_POST['doctor_name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$number=$_POST['phone_number'];
	$file=$_FILES['doc_img']['name'];
	$temp_file=$_FILES['doc_img']['tmp_name'];
	move_uploaded_file($temp_file, "assets/doctor-file/".$file);

	$insertsql="INSERT INTO doctor_table(category_id,subcategory_id,doctor_name,email,phone_number,address,doc_img) VALUES ('$cate_id','$sub_id','$name','$email','$number','$address','$file')";
	$query=mysqli_query($conn,$insertsql);

	if ($query) {
		header('Location:doctor_show.php');
	}
	else{
		echo 'insert not success';
	}
}
?>