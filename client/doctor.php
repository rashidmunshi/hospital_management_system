
<?php
require 'header.php';
require 'footer.php';

$sql="SELECT doctor_table.*,subcategory_table.sub_name FROM doctor_table INNER JOIN subcategory_table ON doctor_table.subcategory_id = subcategory_table.id WHERE doctor_table.status=1";
$query=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="">
		<div class="content">
			<div class="container">
				<div class="row mt-5">
					<h1 class="text-center text-secondary my-4">Doctor's</h1>
					<?php
					if (mysqli_num_rows($query)) {
						while ($row=mysqli_fetch_assoc($query)) {
							$_SESSION['doctor_id']=$row['id'];
							?>
							<div class="col-lg-6 col-xl-3">
								<!-- Simple card -->
								<div class="card">
									<img class="card-img-top img-fluid" src="../admin/assets/doctor-file/<?php echo $row['doc_img'] ?>" alt="Card image cap">
									<div class="card-body">
										<h5 class="card-title"><?php echo $row['doctor_name'];?></h5>
										<p class="card-text"><span class="fw-bold">Mobile Number : </span><?php echo $row['phone_number'];?></p>
										<p class="card-text"><span class="fw-bold">Specility : </span><?php echo $row['sub_name'];?></p>
										<a href="appointment.php?id=<?php echo $row['id']?>" class="btn btn-primary waves-effect waves-light">Appointment</a>
									</div>
								</div>
							</div>
							<?php
						}
					}
					?>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>