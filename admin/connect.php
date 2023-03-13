<?php
session_start();
	$servername='localhost';
	$username='root';
	$password='';
	$db_name='doctor';

	$conn = mysqli_connect($servername,$username,$password,$db_name);
	if (!$conn) {
		echo "connection not success";
	}
?>