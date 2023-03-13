<?php
require 'header.php';
require 'footer.php';
$id=$_GET['id'];
$sql="SELECT * FROM category_table WHERE status='1' AND is_delete='false'";
$res=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sub-category</title>
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

								<form method="post" enctype="multipart/form-data" action="sub-insert.php">

									<select class="form-select" aria-label="Default select example" name="cat_id">
										<option selected>Open this select menu</option>
										<?php

										if (mysqli_num_rows($res) > 0) {
											while ($row=mysqli_fetch_assoc($res)) {

												?>
												<option value="<?php echo $row['id'];?>">
													<?php echo $row['name'];?>
												</option>
												<?php
											}
										}
										?>
									</select>
									<div class="my-3">
										<label  class="form-label">Sub-category Name:</label>
										<input type="text"class="form-control" placeholder="Enter Sub-category"  name="sub_name">
									</div>

									<div class="input-group mb-3">
										<input type="file" class="form-control" name="sub_image">
										<label class="input-group-text">Upload</label>
									</div>
									 <div class="form-check form-switch mb-3">
                                              <input class="form-check-input" type="checkbox" name="status" value="1">
                                              <label class="form-check-label" >Check Status</label>
                                            </div>
									<div class="d-flex justify-content-center">
										<input type="submit" name="submit" value="submit" class="btn btn-primary">
									</div>
								</form> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script src="assets/js/vendor.min.js"></script>

	<!-- Plugins js-->
	<script src="assets/libs/flatpickr/flatpickr.min.js"></script>
	<script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
	<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/libs/flot-charts/jquery.flot.js"></script>
	<script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
	<script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
	<script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
	<script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

	<!-- Dashboar 1 init js-->
	<script src="assets/js/pages/dashboard-1.init.js"></script>

	<!-- App js-->
	<script src="assets/js/app.min.js"></script>		
</body>
</html>