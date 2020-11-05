<?php
	include 'includes/header.php';
	$sub_id=$_GET['sub_id'];
?>
<section style="padding-top:100px;">
    <div class="container">
		<h1 align="center" style="color:orange;">Choose Exam</h1>
        <div class="row align-items-center">
			<?php
			$rs=mysqli_query($cn,"select * from mst_test where sub_id=$sub_id");
			if(mysqli_num_rows($rs)>0){
				while($row=mysqli_fetch_array($rs))
				{
			?>
			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								<p align="center" style="color:orange;"><?php echo $row['test_name'];?></p>
								<p style="text-align:center;font-size:14px;">Total Question: <?php echo $row['total_que'];?></p>
								<p style="text-align:center;font-size:14px;">Duration: <?php echo $row['exam_duration'];?></p>
								<p align="center"><a href="quiz.php?testid=<?php echo $row['test_id'];?>
								&subid=<?php $subid;?>"><button type="button" class="btn btn-success btn-sm">Start Exam</button></a></p>
							</div>
                        </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<?php
			}
			}
			else{
			?>
			<h3>No Exam For This Subject. <a href="index.php"><button type="button" class="btn btn-success btn-sm">Back to Home</button></a></h3><br>
			<?php
			}
			?>
        </div>
    </div>
</section>

  

  
<?php
	include 'includes/footer.php';
?>
 