<?php
	include '../config/database.php';
	include 'includes/header.php';
?>
		<!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Subject List</h6>
            </div>
            <div class="card-body">
				<div class="alert alert-danger alert-dismissible" id="success" style="display:none;">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				</div>
				<?php
						if($_GET['status']==200)
							{
						?>
							<div class="alert alert-success">
								<strong>Success !</strong> Subject Updated Successfully 
							</div>
						<?php
							}
						?>
				<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>Sl No</th>
					  <th>Subject Name</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					$rs=mysqli_query($cn,"select * from mst_subject");
					$i=1;
					while($row=mysqli_fetch_array($rs))
					{
					?>
                    <tr>
					  <td><?php echo $i;?></td>
                      <td><?php echo $row['sub_name'];?></td>
					  <td>
							<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateModal" 
							data-subname="<?php echo $row['sub_name'];?>"
							data-id="<?php echo $row['sub_id'];?>"
							><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger btn-sm delete" data-id="<?php echo $row['sub_id'];?>"><i class="fa fa-trash"></i></button>
						  
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
<!-- Edit Modal-->
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
		<form method="post" action="add_subject_a.php">
        <div class="modal-body">
					<div class="form-group">
					  <label for="email">Subject Name:</label>
					  <input type="text" class="form-control" id="sub_name_u" placeholder="Subject Name" name="sub_name">
					</div>
					<input type="hidden" class="form-control" id="sub_id_u" name="sub_id" >
					<input type="hidden" class="form-control" id="mode" name="mode" value="2">
		</div>
		
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
		</form>
      </div>
    </div>
  </div>	  
	  
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
				url: "ajax/delete_subject.php",
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
						$('#success').html('Subject Deleted Successfully !'); 
					}
				}
			});
		}
		else{
			return false;
		}
	});
});
$(function () {
	$('#updateModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget); // Button that triggered the modal
		var subname = button.data('subname');
		var id = button.data('id');
		var modal = $(this);
		modal.find('#sub_name_u').val(subname);
		modal.find('#sub_id_u').val(id);
});
});
</script>