<?php
require 'connect.php';

if(!empty($_SESSION['admin'])){
	header("Location:dashboard.php");
}
else{
	header("Location:login.php");
}
	
?>