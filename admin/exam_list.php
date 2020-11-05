<?php
	include '../config/database.php';
	include 'includes/header.php';
?>
		<!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Exam List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>Sl No</th>
					  <th>Subject </th>
					  <th>Exam Name</th>
					  <th>Total Questions</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					$rs=mysqli_query($cn,"SELECT * FROM mst_test as t,mst_subject as s WHERE s.sub_id=t.sub_id");
					$i=1;
					while($row=mysqli_fetch_array($rs))
					{
					?>
                    <tr>
					  <td><?php echo $i;?></td>
                      <td><?php echo $row['sub_name'];?></td>
					  <td><?php echo $row['test_name'];?></td>
					  <td><?php echo $row['total_que'];?></td>
					  <td>
					  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateModal" 
							data-testname="<?php echo $row['test_name'];?>"
							data-id="<?php echo $row['test_id'];?>"
							><i class="fa fa-edit"></i></button>
					  <a href="questions_list.php?test_id=<?php echo $row['test_id'];?>&sub_name=<?php echo $row['sub_name'];?>" class="btn btn-success btn-sm">View Questions</a>
					  <a href="add_questions.php?test_id=<?php echo $row['test_id'];?>" class="btn btn-success btn-sm">Edit Questions</a>
					  <a href="#" class="btn btn-danger btn-sm delete" data-id="<?php echo $row['test_id'];?>">Delete</a>
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
		<form method="post" action="add_test_a.php">
        <div class="modal-body">
					<div class="form-group">
					  <label for="email">Exam Name:</label>
					  <input type="text" class="form-control" id="test_name_u" placeholder="Test Name" name="exam_name">
					</div>
					<input type="hidden" class="form-control" id="test_id_u" name="test_id" >
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
		var checkstr =  confirm('Are you sure you want to delete this? All the question qlso delete for the respected Exam. ');
		if(checkstr == true){
			$.ajax({
				url: "ajax/delete_exam.php",
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
						$('#success').html('Exam Deleted Successfully !'); 
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
		var testname = button.data('testname');
		var id = button.data('id');
		var modal = $(this);
		modal.find('#test_name_u').val(testname);
		modal.find('#test_id_u').val(id);
});
});
</script>