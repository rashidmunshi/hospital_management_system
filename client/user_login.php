<?php
require '../admin/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor Project</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
</head>
<body class="authentication-bg authentication-bg-pattern">
	<div class="account-pages mt-5 mb-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-pattern">
						<div class="card-body p-4">	
							<div class="text-center w-75 m-auto">
								<a href="index.html">
									<span><img src="assets/images/logo-dark.png" alt="" height="22"></span>
								</a>
								<h3 class="text-secondary text-center my-3">Log In</h3>
							</div>
							<form  method="post" action="user_login_insert.php">
								<?php
								if (isset($_SESSION['error'])) {
									?>
									<div class="alert alert-danger" role="alert">
										<?php
										echo $_SESSION['error'];
										?>
									</div>
									<div class="text-danger fw-bold show_error">
										
									</div>
									<?php
									unset($_SESSION['error']);
								}
								?>
								<div class="form-group mb-3">
									<label for="emailaddress">Email address</label>
									<input class="form-control" type="email" name="email" required="" placeholder="Enter your email">
								</div>
								<div class="form-group mb-3">
									<label for="password">Password</label>
									<input class="form-control" type="password" name="password" required=""  placeholder="Enter your password">
								</div>
								<div class="form-group mb-0 text-center">
									<button class="btn btn-primary btn-block" type="submit" name="submit"> Log In </button>
								</div>
							</form>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-12 text-center">
							<p class="text-white-50">Don't have an account? <a href="user_register.php" class="text-white ml-1"><b>Sign Up</b></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>
</html>

