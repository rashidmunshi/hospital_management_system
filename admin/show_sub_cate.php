<?php
require 'header.php';
require 'footer.php';

$sql= "SELECT subcategory_table.*,category_table.name FROM subcategory_table INNER JOIN category_table ON subcategory_table.cat_id = category_table.id WHERE subcategory_table.is_delete='false' AND category_table.status=1";



$query=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sub-show-data</title>
</head>
<body>
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                     <div class="d-flex justify-content-between mt-5 mx-5">
                        <h3 class="text-secondary me-5 text-center">SubCategory-List</h3>
                        <a class="btn btn-warning border-0 text-light py-2 px-5 ms-5" href="sub-category.php">Add Sub-Category</a> 
                    </div>
                    <table class="table mt-3">
                      <thead>
                        <tr>
                          <th>Serial No.</th>
                          <th>Category title</th>
                          <th>Name</th>
                          <th>image</th>
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
                              <td><img src="assets/sub-category-file/<?php echo $row['sub_image'] ?>" width="50px"></td>
                              <td>
                                <?php 
                                $checked = "";
                                if($row['status'] == 1) {
                                    $checked = 'checked';
                                }
                                ?>
                                <div class="form-check form-switch">
                                    <input type="checkbox" data-id="<?php echo $row['id'] ?>" id="check" class="form-check-input" <?=$checked?> value="<?=$row['id']?>" type="checkbox">
                                </div>
                            </td>
                            <td><a class="btn btn-primary" href="sub_update.php?id=<?php echo 
                            $row['id'];?>">edit</a> 
                            <a class="btn btn-danger" id="sub_delete" data-id='<?php echo $row['id'];?>' href="javascript: void(0);">delete</a></td>
                        </tr>
                        <?php
                        $i++;
                        ?>
                        <?php
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $(document).on('click','#sub_delete',function(){
            var id=$(this).data('id');
            var self=$(this);
            $.ajax({
                url:'subcat_delete.php',
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
        $(document).on('click','#check',function(){
            var id = $(this).data("id");
            var checks=$(this);
            $.ajax({
                url:'sub_check_update.php',
                type:'post',
                data:{ id : id },
                success:function(data){
                  if(data == 1){
                    $('#check').html("checked");
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



