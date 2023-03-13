<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
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
                                <p class="text-muted mb-4 mt-3">Don't have an account? Create your account, it takes less than a minute</p>
                            </div>
                            <form  method="post" action="user_insert.php" enctype="multipart/form-data">
                             <?php
                             if(isset($_SESSION['error'])) {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['error'];
                                    ?>
                                </div>
                                <?php
                                unset($_SESSION['error']);
                            }
                            ?>
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input class="form-control" name="name" type="text" id="fullname" placeholder="Enter your name" required>
                            </div>
                            <div class="form-group">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" name="email" type="email" id="emailaddress" required placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" name="password" type="password"  placeholder="Enter your password" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mobile Number</label>
                                <input class="form-control" name="mobile_number" type="text" required id="password" placeholder="Enter your mobile No.">
                            </div>
                            <div class="input-group mb-3">
                              <input type="file" class="form-control" name="profile_pic">
                              <label class="input-group-text">Upload</label>
                          </div>
                          <div class="form-group mb-0 text-center">
                            <button class="btn btn-success btn-block" type="submit" name="submit"> Sign Up </button>
                        </div>
                    </form>  
                </div> 
            </div>
            <div class="text-center mt-3">
             <p class="text-white-50">Already have an account? <a href="user_login.php" class="text-white ml-1"><b>Log in</b></a></p>
         </div>
     </div> 
 </div>
</div>
</div>
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>
</body>
</html> 