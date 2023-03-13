<?php

require 'header.php';
require 'footer.php';
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>appoinment.php</title>
	<link rel="stylesheet" href="">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="">
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card mx-auto d-block my-5 p-4 bg-patatern my-5 shadow p-3 mb-5 bg-body rounded" style="width : 700px" >
							<div class="card-body">
								<h2 class="fw-bold text-center mb-3">Appointment Form</h2>
								<form method="post" enctype="multipart/form-data" action="appointment_insert.php">
									<div class="my-3">
										<label class="form-label">Name</label>
										<input type="hidden"  value="<?php echo $_SESSION['user']['id'];?>" 
										name="user_id">
										<input type="hidden" name="doctor_id" value="<?php echo $id;?>">
										<input type="text" value="<?php echo $_SESSION['user']['name'] ;?>" name="name" class="form-control" placeholder="Enter your name">
									</div>
									<div class="my-3">
										<label class="form-label">Email address</label>
										<input type="email" name="email" value="<?php echo $_SESSION['user']['email'] ;?>" class="form-control" placeholder="name@example.com">
									</div>
									<div class="my-3">
										<label class="form-label">Phone Number</label>
										<input type="text" id="number" name="mobile_number" value="<?php echo $_SESSION['user']['mobile_number'] ;?>" class="form-control" placeholder="Enter your Number" maxlength="12">
									</div>	
									<div class="d-flex my-3">
										<div class="input-group date" data-provide="datepicker">
											<input type="date" class="form-control" name="appointment_date">
											<div class="input-group-addon">
												<span class="glyphicon glyphicon-th"></span>
											</div>
										</div>
										<div class="form-outline timepicker">
											<input type="time" class="form-control ms-2" id="form1" name="appointment_time">
										</div>
									</div>
									<input type="submit" name="submit" value="submit" class="btn btn-primary">
									<a href="doctor.php" class="btn btn-danger text-">cancel</a>
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

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			$(document).on('keypress','#number',function(e){
			 var number = (e.which) ? e.which : event.keyCode    
                if (String.fromCharCode(number).match(/[^0-9]/g)) {
                	  return false; 
                }       
			});
		});

	</script>
</body>
</html>

