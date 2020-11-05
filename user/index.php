<?php
	include 'includes/header.php';
	
?>
<section style="padding-top:100px;">
    <div class="container">
		<h1 align="center" style="color:orange;">Choose Subject</h1>
        <div class="row align-items-center">
			<?php
			$rs=mysqli_query($cn,"select * from mst_subject");
			while($row=mysqli_fetch_array($rs))
			{
			?>
			<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								<center><a href="exam_list.php?sub_id=<?php echo $row['sub_id'];?>"><?php echo $row['sub_name'];?></a></center>
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
			?>
        </div>
    </div>
</section>
<?php
	include 'includes/footer.php';
?>
 