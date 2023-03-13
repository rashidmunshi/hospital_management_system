<?php
require 'header.php';
require 'footer.php';

$update_sub_id=$_GET['id'];

$sql="SELECT * FROM subcategory_table  WHERE id='$update_sub_id'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
	$update_sub_id=$_GET['id'];

	$category_name=$_POST['cat_id'];
	$name=$_POST['sub_name'];
	$status=$_POST['status'];
	
	if (isset($_FILES['sub_image']['tmp_name']) && !empty($_FILES['sub_image']['tmp_name'])) {
		$file=$_FILES['sub_image']['name'];
		$tempfile=$_FILES['sub_image']['tmp_name'];

		if (!empty($_POST['old_sub_image'])) {
			unlink("assets/sub-category-file/".$_POST['old_sub_image']);
		}
		move_uploaded_file($tempfile,"assets/sub-category-file/".$file);
	}
	else{
		$file=$_POST['old_sub_image'];
	}

	$updatequery="UPDATE subcategory_table SET cat_id ='$category_name',sub_name='$name',sub_image='$file',status
	='$status' WHERE id='$update_sub_id'";
	$edit=mysqli_query($conn,$updatequery);
	if ($edit) {
		echo('<script>location.href="show_sub_cate.php";</script>');
	}

}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sub-update</title>
</head>
<body>
	<div class="content-page">
		<div class="content">

			<!-- Start Content-->
			<div class="container-fluid">

				<!-- start page title -->
				<div class="row">
					<div class="col-12">
						<div class="card mx-auto d-block my-5 p-4 bg-patatern my-5 shadow p-3 mb-5 bg-body rounded" style="width : 500px" >
							<div class="card-body">
								<h2 class="fw-bold text-center mb-3">Sub-Category Form</h2>

								<form method="post" enctype="multipart/form-data">

									<?php
									$sql2="SELECT * FROM category_table";
									$query2=mysqli_query($conn,$sql2);
									?>
									<select class="form-select" aria-label="Default select example" name="cat_id">
										<option selected>Open this select menu</option>
										<?php

										if (mysqli_num_rows($query2) > 0) {
											while ($row2=mysqli_fetch_assoc($query2)) {

												?>
												<option value="<?php echo $row2['id']?>"<?php 
												if($row2['id']==$row['cat_id']) {echo 'selected';}?>>
												<?php echo $row2['name'];?>
											</option>
											<?php
										}
									}
									?>
								</select>
								<div class="my-3">
									<label  class="form-label">Sub-category Name:</label>
									<input type="text"class="form-control" placeholder="Enter Sub-category"  name="sub_name" value="<?php echo 
									$row['sub_name'];?>">
								</div>
								<div class="input-group mb-3">
									<img src="assets/sub-category-file/<?php echo $row['sub_image'];?> " width="100px">
									<input type="hidden" name="old_img" value=
									"<?php echo $row['old_sub_image'];?>">
									<input type="file" class="form-control" name="sub_image">
									<label class="input-group-text">Upload</label>
								</div>
								<div class="form-check form-switch mb-3">
                                              <input class="form-check-input" type="checkbox" name="status" 
                                              value="1" <?php if ($row['status'] == 1) { echo 'checked ="checked"';} ?>>
                                              <label class="form-check-label" >Check Status</label>
                                 </div>
								<div class="d-flex justify-content-center">
									<input type="submit" name="update" value="update" class="btn btn-primary">
									<a class="btn btn-danger ms-3" href="show_sub_cate.php">Cancel</a>
								</div>
							</form> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>