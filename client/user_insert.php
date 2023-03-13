<?php
require '../admin/connect.php';

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$mobile_number=$_POST['mobile_number'];
	$file=$_FILES['profile_pic']['name'];
	$temp_file=$_FILES['profile_pic']['tmp_name'];

	move_uploaded_file($temp_file, "client_img_file/".$file);
	$emailquery="SELECT * FROM patient WHERE email='$email'";
	$query=mysqli_query($conn,$emailquery);

	if (mysqli_num_rows($query) > 0) {
		$_SESSION['error'] = "Email already exsits!";
		header('Location: user_register.php');
		exit();
	}
	else{
		$insertquery="INSERT INTO patient(name,email,password,mobile_number,profile_pic) VALUES('$name','$email','$password','$mobile_number','$file')";
		$sql=mysqli_query($conn,$insertquery);
		if ($sql) {
			header('Location:user_login.php');
			exit();
		}
		else{
			echo 'data not insert';
		}
	}
}
?>