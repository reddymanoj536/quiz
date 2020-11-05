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
              <h6 class="m-0 font-weight-bold text-primary">Add Subject</h6>
            </div>
            <div class="card-body">
				<div class="container">
						<?php
						if($_GET['status']==200)
							{
						?>
							<div class="alert alert-success">
								<strong>Success !</strong> Subject Added Successfully.
							</div>
						<?php
							}
						?>
						<?php
						if($_GET['status']==201)
							{
						?>
							<div class="alert alert-danger">
								<strong>Error !</strong> Subject name already exist.
							</div>
						<?php
							}
						?>
				<form id="register_form" name="form1" method="post" action="add_subject_a.php">
					<div class="form-group">
					  <label for="email">Subject Name:</label>
					  <input type="text" class="form-control" id="sub_name" placeholder="Subject Name" name="sub_name" required>
					</div>
					<input type="hidden" class="form-control" id="sub_name" placeholder="Subject Name" name="mode" value="1">
					<p align="center"><button type="submit" class="btn btn-primary" id="butsave">Create  User</button></p>
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