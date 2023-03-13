   <?php
   require 'header.php';
   $sql="SELECT * FROM category_table WHERE is_delete='false'";
   $result = mysqli_query($conn,$sql);
   ?>
   <div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                   <div class="d-flex justify-content-between mt-5 mx-5">
                    <h3 class="text-secondary me-5 text-center">Category-List</h3>
                    <a class="btn btn-warning border-0 text-light py-2 px-5 ms-5" href="category_insert.php">Add</a> 
                </div>
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Name</th>
                      <th>image</th>
                      <th>status</th>
                      <th>Opretion</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row=mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                          <th><?php echo $i ?></th>
                          <td><?php echo $row['name']?></td>
                          <td><img src="assets/file-upload/<?php echo $row['image'] ?>" width="50px"></td>
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
                        <td><a class="btn btn-primary me-3" href="category_update.php?id=<?php echo $row['id'];?>">Edit</a>
                            <a class="delete btn btn-danger border-0" id="delete_btn" 
                            data-id='<?php  $row['id'];?>' href="cat_delete.php?id=<?php echo $row['id'];?>">Delete</a>
                        </td>

                    </tr>
                    <?php $i++ ?>
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
<script type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click','#delete_btn',function(){
            var delete_id=$(this).data('id');
            $.ajax({
                url:'cat_delete.php',
                type:'post',
                data:{id : delete_id },
                success:function(response){
                    if(response == 1){
                        $(this).closest('tr').remove();
                    }
                },
                error:function(error){
                    console.log(error);
                }
            });
        });
    });
    $(document).ready(function(){
        $(document).on('click','#check_btn',function(){
            var check_id = $(this).data("id");
            $.ajax({
                url:'check_update.php',
                type:'post',
                data:{ check_id :check_id },
                success:function(data){
                  if(data == 1){
                    $('#check_btn').html("checked");
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
<?php
require 'footer.php';

?>