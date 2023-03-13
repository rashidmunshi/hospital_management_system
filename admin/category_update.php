<?php

require 'header.php';
require 'footer.php';

$update_id=$_GET['id'];
$selectquery="SELECT * FROM category_table WHERE `id`=$update_id";
$result=mysqli_query($conn,$selectquery);
$row=mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
	$update_id=$_GET['id'];
	$name=$_POST['name'];
	$status=$_POST['status'];
	if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
		$file=$_FILES['image']['name'];
		$tempfile=$_FILES['image']['tmp_name'];
		if (!empty($_POST['old_img'])) {
			unlink("assets/file-upload/".$_POST['old_img']);
		}
		move_uploaded_file($tempfile,"assets/file-upload/".$file);
	}
	else{
		$file=$_POST['old_img'];
	}
	$updatequery="UPDATE category_table SET name='$name',image='$file',status='$status' WHERE id='$update_id'";
	$check=mysqli_query($conn,$updatequery);
	if ($check) {
		echo "data updated";
		echo('<script>location.href="category.php";</script>');
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>category_update</title>
</head>
<body>
	<div class="content-page">
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card mx-auto d-block my-5 p-4 bg-patatern my-5 shadow p-3 mb-5 bg-body rounded" style="width : 500px" >
							<div class="card-body">
								<h2 class="fw-bold text-center mb-3">Category Add</h2>
								<form method="post" enctype="multipart/form-data">
									<input type="hidden" name="id" value="<?php $row['id']?>">
									<div class="form-floating mb-3">
										<input type="text" name="name" class="form-control" placeholder="Enter Your Name" value="<?php
										echo $row['name'];?>">
										<label for="floatingInput">Name</label>
									</div>
									<div class="input-group mb-3">
										<img src="assets/file-upload/<?php echo $row['image'];?> " width="100px">
										<input type="hidden" name="old_img" value=
										"<?php echo $row['image'];?>">
										<input type="file" class="form-control" name="image">
										<label class="input-group-text">Upload</label>
									</div>
									<div class="form-check form-switch mb-3">
										<input class="form-check-input" type="checkbox" name="status" 
										value="1" <?php if ($row['status'] == 1) { echo 'checked ="checked"';} ?>>
										<label class="form-check-label" >Check Status</label>
									</div>
									<div class="d-flex justify-content-center">
										<input type="submit" name="update" value="Update" class="btn btn-primary">
										<a class="btn btn-danger ms-3" href="category.php">Cancel</a>
									</div>
								</form> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	</script>
</body>
</html>



