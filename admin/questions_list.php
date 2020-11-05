<?php
	include '../config/database.php';
	include 'includes/header.php';
	$test_id=$_GET['test_id'];
?>
		<!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Questions List For </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
					  <th>Sl No</th>
					  <th>Exam Name</th>
					  <th>Question</th>
					  <th>Option 1</th>
					  <th>Option 2</th>
					  <th>Option 3</th>
					  <th>Option 4</th>
					  <th>Right Answer</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					$rs=mysqli_query($cn,"SELECT * FROM mst_test as t,mst_question as q  WHERE q.test_id=t.test_id and t.test_id=$test_id");
					$i=1;
					while($row=mysqli_fetch_array($rs))
					{
					?>
                    <tr>
					  <td><?php echo $i;?></td>
                      <td><?php echo $row['test_name'];?></td>
					  <td><?php echo $row['que_desc'];?></td>
					  <td><?php echo $row['ans1'];?></td>
					  <td><?php echo $row['ans2'];?></td>
					  <td><?php echo $row['ans3'];?></td>
					  <td><?php echo $row['ans4'];?></td>
					  <td><?php echo $row['true_ans'];?></td>
					  
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