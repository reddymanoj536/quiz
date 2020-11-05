<?php
	include '../config/database.php';
	include 'includes/header.php';
?>
		<!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Students List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>Sl No</th>
					  <th>Login Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					$rs=mysqli_query($cn,"select * from mst_user");
					$i=1;
					while($row=mysqli_fetch_array($rs))
					{
					?>
                    <tr>
					  <td><?php echo $i;?></td>
                      <td><?php echo $row['login'];?></td>
                      <td><?php echo $row['username'];?></td>
                      <td><?php echo $row['email'];?></td>
                      <td><?php echo $row['phone'];?></td>
					  <td>
							<button type="button" class="btn btn-danger btn-sm delete" data-id="<?php echo $row['user_id'];?>"><i class="fa fa-trash"></i></button>
						  
					  </td>
                    </tr>
					<?php
					$i++;
					}
					?>
					</tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
	include 'includes/footer.php';
?>
<script>
$(document).ready(function() {
	$(document).on("click", ".delete", function() {
		var id=$(this).attr("data-id");
		var $ele = $(this).parent().parent();
		var checkstr =  confirm('are you sure you want to delete this?');
		if(checkstr == true){
			$.ajax({
				url: "ajax/delete_user.php",
				type: "POST",
				cache: false,
				data:{
					type: 2,
					id: id
				},
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$ele.fadeOut().remove();
						$("#success").show();
						$('#success').html('Student Deleted Successfully !'); 
					}
				}
			});
		}
		else{
			return false;
		}
	});
});
</script>