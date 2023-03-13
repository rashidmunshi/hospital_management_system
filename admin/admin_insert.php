<?php
require 'connect.php';

if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password =   md5($_POST['password']);
	$sql = "SELECT * FROM login WHERE email = '$email' AND password = '$password'";
	$query = mysqli_query($conn, $sql);
	$result= mysqli_num_rows($query);
	$row=mysqli_fetch_assoc($query);

	if($result > 0) {
		$_SESSION['admin']=$row['email'];
		$_SESSION['admin']=$row['password'];

		header('Location:dashboard.php');
		exit();
	} else {
		$_SESSION['error'] = "Email & Password not match!";
		header('Location:login.php');
		exit();
	}
}
?>