<?php

require 'header.php';
require 'footer.php';

$id=$_GET['id'];
$sql="SELECT doctor_table.* FROM doctor_table INNER JOIN subcategory_table ON doctor_table.subcategory_id = subcategory_table.id WHERE doctor_table.id=".$id;    
$query=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $update_id=$_GET['id'];
    $category_name=$_POST['category_id'];
    $subcategory_name=$_POST['subcategory_id'];
    $name=$_POST['doctor_name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
    $address=$_POST['address'];
    $status=$_POST['status'];

    if (isset($_FILES['doc_img']['tmp_name']) && !empty($_FILES['doc_img']['tmp_name'])) {
        $file=$_FILES['doc_img']['name'];
        $tempfile=$_FILES['doc_img']['tmp_name'];

        if (!empty($_POST['old_img'])) {
            unlink("assets/doctor-file/".$_POST['old_img']);
        }
        move_uploaded_file($tempfile,"assets/doctor-file/".$file);
    }
    else{
        $file=$_POST['old_img'];
    }

    $updatequery="UPDATE doctor_table SET category_id='$category_name',
    subcategory_id='$subcategory_name',doctor_name='$name',email='$email',phone_number='$phone_number',address='$address',doc_img='$file',status='$status' WHERE id='$update_id'";

    $check=mysqli_query($conn,$updatequery);
    if ($check) {
        echo "data updated";
        echo('<script>location.href="doctor_show.php";</script>');
    }
    else{
        echo'<script>console.log("not updated")</script>';
    }

}
?>
<!DOCTYPE html>
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
                        <div class="card mx-auto d-block my-5 p-4 bg-patatern my-5 shadow p-3 mb-5 bg-body rounded" style="width : 700px">
                            <div class="card-body">
                                <h2 class="fw-bold text-center mb-3">Doctor Form</h2>
                                <?php
                                $sql2="SELECT * FROM category_table";
                                $que=mysqli_query($conn,$sql2);
                                ?>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="d-flex">
                                        <select class="form-select" id="category_drop" name="category_id">
                                            <option selected>categoty-select</option>
                                            <?php
                                            if (mysqli_num_rows($que) > 0) {
                                                while ($row=mysqli_fetch_assoc($que)) {
                                                    ?>
                                                    <option value="<?php echo $row['id'];?>" <?php  if($row['id'] == $result['category_id']) {echo 'selected';} ?>>

                                                        <?php echo $row['name'];?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <?php  
                                            $sql3="SELECT * FROM subcategory_table WHERE cat_id =".$result['category_id'];
                                            $query2=mysqli_query($conn,$sql3);
                                            ?>
                                        </select>
                                        <select class="form-select ms-3" id="sub-cate" name="subcategory_id">  
                                            <?php
                                            if (mysqli_num_rows($query2)>0) {
                                                while($row3=mysqli_fetch_assoc($query2)){
                                                    ?>
                                                    <option value="<?php echo $row3['id']?>" 
                                                        <?php if($row3['id'] == $result['subcategory_id'] )
                                                        { echo "selected";}  ?>> <?php echo $row3['sub_name'];?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="my-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="doctor_name" class="form-control" placeholder="Enter your name" value="<?php echo $result['doctor_name'];?>">
                                        </div>
                                        <div class="my-3">
                                            <label class="form-label">Email address</label>
                                            <input type="email" name="email" class="form-control" placeholder="name@example.com" value="<?php echo $result['email'];?>">
                                        </div>
                                        <div class="my-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="phone_number" class="form-control" placeholder="Enter your Number" 
                                            value="<?php echo $result['phone_number'];?>">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <textarea class="form-control" rows="3" name="address"><?php echo $result['address'];?></textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="hidden" name="old_img" value=
                                            "<?php echo $result['doc_img'];?>">
                                            <img src="assets/doctor-file/<?php echo $result['doc_img'];?> " width="100px">
                                            <input type="file" class="form-control" name="doc_img">
                                            <label class="input-group-text">Upload</label>
                                        </div>
                                        <div class="form-check form-switch mb-3">
                                          <input class="form-check-input" type="checkbox" name="status" 
                                          value="1"<?php if ($result['status'] == 1) { echo 'checked ="checked"';} ?>>
                                          <label class="form-check-label" >Check Status</label>
                                      </div>
                                      <input type="submit" name="update" value="update" class="btn btn-primary">
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
                })  
            })
        })
    </script>
</body>
</html>


