<?php
require 'header.php';
require 'footer.php';

$sql="SELECT doctor_table.*,category_table.name,subcategory_table.sub_name FROM  doctor_table INNER JOIN category_table ON category_table.id = doctor_table.category_id INNER JOIN subcategory_table ON doctor_table.subcategory_id = subcategory_table.id WHERE 
doctor_table.is_delete='false'";
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
                    <h3 class="text-secondary me-5 text-center">Doctor List</h3>
                    <a class="btn btn-warning border-0 text-light py-2 px-5 ms-5" href="doctor.php">Add Doctor</a> 
                </div>
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Category title</th>
                      <th>subcategory title</th>
                      <th>doctor_name</th>
                      <th>email</th>
                      <th>number</th>
                      <th>address</th>
                      <th>doc_img</th>
                      <th>status</th>
                      <th>Opretion</th>
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
                          <td><?php echo $row['sub_name'];?></td>
                          <td><?php echo $row['doctor_name']; ?></td>
                          <td><?php echo $row['email'];?></td>
                          <td><?php echo $row['phone_number'];?></td>
                          <td><?php echo $row['address'];?></td>
                          <td><img src="assets/doctor-file/<?php echo $row['doc_img'] ?>" width="50px"></td>
                          <td>
                            <?php
                            $checked='';
                            if($row['status'] == 1){
                                $checked='checked';
                            }    
                            ?>
                            <div class="form-check form-switch">
                                <input type="checkbox" role="switch" data-id=<?php echo $row['id'];?> id="check_btn" class="form-check-input" <?=$checked?> value="<?=$row['id']?>" type="checkbox">
                            </div>
                        </td>
                        <td>
                          <a class="btn btn-primary" href="doctor_update.php?id=<?php echo $row['id'];?>">edit</a> 
                          <a class="btn btn-danger" id="sub_delete" data-id='<?php echo $row['id'];?>' href="javascript: void(0);">delete</a></td>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','#check_btn',function(){
            var id=$(this).data('id');
            var self=$(this);
            $.ajax({
                url:'doctor_check_update.php',
                type:'POST',
                data:{id : id },
                success:function(data){
                    if(data == 1){
                        $(self).closest('tr').remove();
                    }
                },
                error:function(error){
                    console.log(error);
                }
            });
        });
    });
    $(document).ready(function(){
        $(document).on('click','#sub_delete',function(){
            var delete_id=$(this).data('id');
            var self=$(this);
            $.ajax({
                url:'doctor_delete.php',
                type:'post',
                data:{id : delete_id },
                success:function(data){
                    if(data == 1){
                        $(self).closest('tr').remove();
                    }
                },
                error:function(error){
                    console.log(error);
                }
            });
        });
    });
</script>
</body>
</html>

