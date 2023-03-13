<?php
require 'header.php';
require 'footer.php';

$sql="SELECT appointment.*,doctor_table.doctor_name FROM appointment INNER JOIN doctor_table ON appointment.doctor_id = doctor_table.id  ORDER BY appointment.id DESC";
$query=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sub-show-data</title>
</head>

<div class="content-page">
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="d-flex justify-content-between mt-5 mx-5">
						<h3 class="text-secondary mx-auto d-bltext-center">Appointment List</h3> 
					</div>
					
					<table class="table mt-3">
						<thead>
							<tr>
								<th>Serial No.</th>
								<th>patient Name</th>
								<th>doctor name</th>
								<th>email</th>
								<th>number</th>
								<th>appointment_date</th>
								<th>appointment_time</th>
								<th >appointment</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i=1;
							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_assoc($query)) {
									?>

									<tr>

										<th><?php echo $i ?></th>
										<td><?php echo $row['name']?></td>
										<td><?php echo $row['doctor_name'];?></td>
										<td><?php echo $row['email'];?></td>
										<td><?php echo $row['mobile_number'];?></td>
										<td><?php echo $row['appointment_date'];?></td>
										<td><?php echo $row['appointment_time'];?></td>
										<td>
											<?php
											if ($row['status']==0) {
												?>
												<a class="btn btn-success" id="Accept" data-status='1'  data-id="<?php echo $row['id'] ;?>" href="javascript:void(0);">Accept</a>

												<a class="btn btn-danger" id="reject" data-status='2' data-id="<?php echo $row['id'] ;?>" href="javascript:void(0);">reject</a>
												<?php
											}

											elseif($row['status']==1){ 
												?>
												<div class="alert alert-success" role="alert">
													Your Appointment sucess
												</div>
												<?php
											}
											elseif($row['status']==2){
												?>
												<div class="alert alert-danger" role="alert">
													Your Appointment decline
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
							?>
						</tbody>
					</table>
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

	$(document).ready(function(){
		$(document).on('click','#Accept',function(e){
			e.preventDefault();
			var accept_id=$(this).data('id');
			var status_id=$(this).data('status');
			var spinner="<div></div><div class='spinner-border spinner-border-sm me-3' role='status'></div><span> Loading...</span>";
			$(this).html(spinner);

			$.ajax({
				url:'update_appointment.php',
				type:'post',
				data:{ appointment_id: accept_id ,
				status_id : status_id
			},
			success:function(data){		
				window.location='appointment.php';
			},
		});
		});
	});
	$(document).ready(function(){
		$(document).on('click','#reject',function(){
			var reject_id=$(this).data('id');
			var status_id=$(this).data('status');
			var spinner="<div class='spinner-border spinner-border-sm me-3' role='status'></div><span> Loading...</span>";
			$(this).html(spinner);
			$.ajax({
				url:'update_appointment.php',
				type:'post',
				data:{ appointment_id: reject_id ,
				status_id : status_id},
				success:function(data){
					window.location='appointment.php';
				},
			});
		});

	});

</script>
