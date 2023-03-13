<?php
require '../admin/connect.php';

if(isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password =md5( $_POST['password']);

	$sql = "SELECT * FROM patient WHERE email = '$email' AND password = '$password'";
	$query = mysqli_query($conn, $sql);
	$result= mysqli_num_rows($query);
	$row=mysqli_fetch_assoc($query);
	if($result > 0) {
		$_SESSION['user'] = array(
			'id' => $row['id'],
			'name' => $row['name'],
			'email'=> $row['email'],
			'mobile_number'=>$row['mobile_number']
		);	
		header('Location:doctor.php');
		exit();
	} else {
		$_SESSION['error'] = "Email & Password not match!";
		header('Location:user_login.php');
		exit();
	}
}
?>

