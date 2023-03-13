    <?php
    require 'header.php';
    require 'footer.php';
    ?>
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
        <link href="assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                                <form method="post" enctype="multipart/form-data" action="cat-insert.php">
                                    <div class="form-floating mb-3">
                                      <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                                      <label for="floatingInput">Name</label>
                                  </div>
                                  <div class="input-group mb-3">
                                      <input type="file" class="form-control" name="image">
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
<div class="rightbar-overlay"></div>
<script src="assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="assets/libs/flot-charts/jquery.flot.js"></script>
<script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
<script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
<script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
<script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="assets/js/pages/dashboard-1.init.js"></script>
<script src="assets/js/app.min.js"></script>
</body>
</html>