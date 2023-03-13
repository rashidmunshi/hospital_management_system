<?php

require 'connect.php';


$check_id=$_POST['check_id'];
$showquery="SELECT * FROM category_table WHERE id='$check_id'";
$sql2=mysqli_query($conn,$showquery);
$row2=mysqli_fetch_assoc($sql2);

if($row2['status']==1){
	$checkquery=" UPDATE category_table SET status='0' WHERE id='$check_id'";
}
else{
	$checkquery=" UPDATE category_table SET status='1' WHERE id='$check_id'";
}

$sql=mysqli_query($conn,$checkquery);
if($sql){
	echo 'success';
}
else{
	echo 'unsucess';
}

?>