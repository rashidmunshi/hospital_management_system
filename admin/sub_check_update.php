<?php
require 'connect.php';
		$check_id=$_POST['id'];
		$showquery="SELECT * FROM subcategory_table WHERE id='$check_id'";
		$sql2=mysqli_query($conn,$showquery);
		$row2=mysqli_fetch_assoc($sql2);
		
		if($row2['status'] == 1){
			$checkquery=" UPDATE subcategory_table SET status='0' WHERE id='$check_id'";
		}
		else{
			$checkquery=" UPDATE subcategory_table SET status='1' WHERE id='$check_id'";
		}

		$sql=mysqli_query($conn,$checkquery);
			if($sql){
				echo 'success';
			}
			else{
				echo 'unsucess';
			}

?>