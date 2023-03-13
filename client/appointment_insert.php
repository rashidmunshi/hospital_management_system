<?php
require '../admin/connect.php';

if(isset($_POST['submit'])){
	$user_id=$_POST['user_id'];
	$doctor_id=$_POST['doctor_id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile_number=$_POST['mobile_number'];
	$date=$_POST['appointment_date'];
	$time=$_POST['appointment_time'];

	if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",$mobile_number)) {
		
	}

	$insertquery="INSERT INTO appointment(user_id,doctor_id,name,email,mobile_number,appointment_date,appointment_time) VALUES('$user_id','$doctor_id','$name','$email','$mobile_number','$date','$time')";

	$sql=mysqli_query($conn,$insertquery);
	if ($sql) {
		header('Location:show_appointment.php');
	}
}

?>