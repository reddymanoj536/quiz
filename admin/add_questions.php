<?php
	include '../config/database.php';
	include '../config/access.php';
	include 'includes/header.php';
	$test_id=$_GET['test_id'];
	$rs=mysqli_query($cn,"select * from mst_question WHERE test_id=$test_id");
	$rowcount=mysqli_num_rows($rs);
	
?>	
		<!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Update Questions</h6>
            </div>
            <div class="card-body">
				<div class="container">
						<?php
						if($_GET['status']==200)
							{
						?>
							<div class="alert alert-success">
								<strong>Success !</strong> Exam Created Successfully.Please fill the Questions
							</div>
						<?php
							}
						?>
						<?php
						if($_GET['status']==succ)
							{
						?>
							<div class="alert alert-success">
								<strong>Success !</strong> Questions Updated Successfully !
							</div>
						<?php
							}
						?>
				<form id="exam_form" name="form1" method="post" action="add_questions_a.php">
					<?php
						$i=0;
						while($row=mysqli_fetch_array($rs)){
					?>
				<div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
						<h4 style="padding-bottom:10px;color:#4e73df;font-weight:bold;">Question <?php echo $i+1;?></h4>
						<div class="form-group">
							<input type="text" class="form-control" id="exam_duration" placeholder="Question Name" name="questions_name[]" value="<?php echo $row['que_desc'];?>">
						</div>
						<div class="form-group">
							
							<input type="text" class="form-control" id="exam_duration" placeholder="Option One" name="option_one[]" value="<?php echo $row['ans1'];?>">
						</div>
						<div class="form-group">
							
							<input type="text" class="form-control" id="exam_duration" placeholder="Option Two" name="option_two[]" value="<?php echo $row['ans2'];?>">
						</div>
						<div class="form-group">
							
							<input type="text" class="form-control" id="exam_duration" placeholder="Option Three" name="option_three[]" value="<?php echo $row['ans3'];?>">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="exam_duration" placeholder="Option Four" name="option_four[]" value="<?php echo $row['ans4'];?>">
						</div>
						<div class="form-group">
							<select class="form-control" name="right_answer[]">
								<option value="">Select</option>
								<option value="1" <?php if($row['true_ans']==1) echo "Selected";?>>Option One</option>
								<option value="2" <?php if($row['true_ans']==2) echo "Selected";?>>Option Two</option>
								<option value="3" <?php if($row['true_ans']==3) echo "Selected";?>>Option Three</option>
								<option value="4" <?php if($row['true_ans']==4) echo "Selected";?>>Option Four</option>
							</select>
						</div>
					
					</div>
				</div>
					<br>
					<?php
					$i++;
						}
					?>
					<input type="hidden" name="test_id" value="<?php  echo $test_id;?>">
					<input type="hidden" name="total_que" value="<?php  echo $rowcount;?>">
					<p align="center"><button type="submit" class="btn btn-primary" id="butsave">Submit</button></p>
				</form>
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