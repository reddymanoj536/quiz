<?php
	include '../config/database.php';
	include '../config/access.php';
	include 'includes/header.php';
?>	
		<!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Add Exam</h6>
            </div>
            <div class="card-body">
				<div class="container">
				
				<form id="exam_form" name="form1" method="post" action="add_test_a.php">
					<div class="form-group">
						<label for="email">Choose Subject:</label>
						<select class="form-control" id="subject_id" name="subject_id" required> 
							<option value="">Select</option>
							<?php
							$rs=mysqli_query($cn,"select * from mst_subject");
							while($row=mysqli_fetch_array($rs))
							{
							?>
							<option value="<?php echo $row['sub_id'];?>"><?php echo $row['sub_name'];?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="Exam">Exam Name:</label>
						<input type="text" class="form-control" id="exam_name" placeholder="Test Name" name="exam_name" required>
					</div>
					<div class="form-group">
						<label for="email">Total Questions:</label>
						<input type="number" class="form-control" id="total_questions" placeholder="Total Questions" name="total_questions" required>
					</div>
					<div class="form-group">
						<label for="email">Exam Duration(In Minute):</label>
						<input type="number" class="form-control" id="exam_duration" placeholder="Exam Duration" name="exam_duration" required>
					</div>
					<input type="hidden" class="form-control"  name="mode" value="1">
					<p align="center"><button type="submit" class="btn btn-primary" id="butsave">Next</button></p>
				</form>
				<h3><strong>Incomplete Exam List</strong></h3>
				<table class="table table-bordered" width="100%" cellspacing="0">
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
					$rs=mysqli_query($cn,"SELECT * FROM mst_test as t,mst_subject as s WHERE s.sub_id=t.sub_id and t.status=0");
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
					  <a href="add_questions.php?test_id=<?php echo $row['test_id'];?>" class="btn btn-success btn-sm">Edit Questions</a>
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