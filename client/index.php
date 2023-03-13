<?php
require '../admin/connect.php';

if($_SESSION['user']){
	header("Location:homepage.php");
}
else{
	header("Location:user_login.php");
}
?>