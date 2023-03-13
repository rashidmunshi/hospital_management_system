<?php

require 'header.php';
require 'footer.php';

$id=$_SESSION['user']['id'];
$sql="SELECT appointment.*,doctor_table.doctor_name FROM appointment INNER JOIN doctor_table ON 
appointment.doctor_id = doctor_table.id WHERE appointment.user_id='$id' AND appointment.status ";
$query=mysqli_query($conn,$sql);

?>
<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Appointment</title>
	<link rel="stylesheet" href="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
	<div class="mt-5">
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card mx-auto d-block my-5 p-4 bg-patatern my-5 shadow p-3 mb-5 bg-body rounded h-100" style="width : 700px" id="example">
							<div class="d-flex justify-content-between  ">
								<h3 class="text-secondary mx-auto d-bltext-center">My Appointment</h3> 
							</div>
							<table class="table my-4">
								<tbody>
									<?php
									$i=1;
									if (mysqli_num_rows($query) > 0) {
										while($row=mysqli_fetch_assoc($query)){
											?>
											<tr>
												<td class="fw-bold"><i class="fa fa-user me-2"></i>Name:</td>
												<td><?php echo $row['name'];?></td>
											</tr>
											<td class="fw-bold"><i class="fa-solid fa-stethoscope me-2"></i>Doctor Name  :</td>
											<td><?php echo $row['doctor_name'];?></td>
											<tr>
												<td class="fw-bold"><i class="fa-solid fa-calendar-days me-2"></i>Appointment Date:</td>
												<td><?php echo $row['appointment_date'];?></td>
											</tr>
											<tr> 
												<td class="fw-bold"><i class="fa-solid fa-clock me-2"></i>Appointment Time:</td>
												<td><?php echo $row['appointment_time'];?></td>
											</tr>
											<tr>
												<td class="fw-bold"><i class="fa-regular fa-calendar-check me-2" ></i>Appointment</td>
												<td>
													<?php
													if ($row['status'] == 0) {
														?>
														<div class="alert alert-secondary p-2" role="alert">
															pending...
														</div>
														<?php
													}
													elseif ($row['status'] == 1) {
														?>
														<div class="alert alert-success p-2" role="alert">
															Appointment Accept
														</div>
														<?php
													}
													elseif($row['status'] == 2){
														?>
														<div class="alert alert-danger p-2" role="alert">
															Appointment Decline
														</div>
														<?php
													}
													?>
												</td>
											</tr>

											<?php
											$i++;
										}
									}
									else{
										
										echo "<h4 id='alert' class='text-center text-danger mt-3'>Please 
										Make an appointment first!<i class='fa-solid fa-hand-point-down ms-2 text-dark'></i></h4>";
										echo "<a href='doctor.php' class='btn btn-primary mt-3 mx-auto d-block w-25'>Appointment</a>";
									}
									?>
								</tbody>
							</table>

							<a href="doctor.php" class="btn btn-danger text-decoration-none float-right">Back</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

	<script type="text/javascript">
		

	</script>
