<?php
require 'header.php';
require 'footer.php';

$sql="SELECT * FROM category_table WHERE status ='1'";
$query=mysqli_query($conn,$sql);
?>

<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="content-page">
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card mx-auto d-block my-5 p-4 bg-patatern my-5 shadow p-3 mb-5 bg-body rounded" style="width : 700px" >
							<div class="card-body">
								<h2 class="fw-bold text-center mb-3">Doctor Form</h2>
								<form method="post" enctype="multipart/form-data" action="doc_insert.php">
									<div class="d-flex">
										<select class="form-select" id="category_drop" name="cat-id">
											<option selected>categoty-select</option>
											<?php
											if (mysqli_num_rows($query) > 0) {
												while ($row=mysqli_fetch_assoc($query)) {

													?>
													<option value="<?php echo $row['id'];?>">
														<?php echo $row['name'];?>
													</option>
													<?php
												}
											}
											?>
										</select>
										<select class="form-select ms-3" id="sub-cate" name="sub_category_id">	
										</select>
									</div>
									<div class="my-3">
										<label class="form-label">Name</label>
										<input type="text" name="doctor_name" class="form-control" placeholder="Enter your name">
									</div>
									<div class="my-3">
										<label class="form-label">Email address</label>
										<input type="email" name="email" class="form-control" placeholder="name@example.com">
									</div>
									<div class="my-3">
										<label class="form-label">Phone Number</label>
										<input type="text" name="phone_number" class="form-control" placeholder="Enter your Number">
									</div>
									<div class="mb-3">
										<label class="form-label">Address</label>
										<textarea class="form-control" rows="3" name="address"></textarea>
									</div>
									<div class="input-group mb-3">
										<input type="file" class="form-control" name="doc_img">
										<label class="input-group-text">Upload</label>
									</div>
									<div class="form-check form-switch mb-3">
										<input class="form-check-input" type="checkbox" name="status" value="1">
										<label class="form-check-label" >Check Status</label>
									</div>
									<input type="submit" name="submit" value="submit" class="btn btn-primary">
								</form> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="assets/js/vendor.min.js"></script>

	<script src="assets/libs/flatpickr/flatpickr.min.js"></script>
	<script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
	<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/libs/flot-charts/jquery.flot.js"></script>
	<script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
	<script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
	<script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
	<script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

	<script src="assets/js/pages/dashboard-1.init.js"></script>
	<script src="assets/js/app.min.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(document).on('change','#category_drop',function(){
				var category_id = $(this).val();
				$.ajax({
					url:'doc_insert.php',
					method : "POST" ,
					data:{category_id : category_id },
					success:function(response){
						$("#sub-cate").html(response);
					},
				});
			});
		});
	</script>
</body>
</html>