<?php
	session_start();
	include 'includes/header.php';
	extract($_POST);
	extract($_SESSION);
	if($submit=='Finish')
	{
		mysqli_query($cn,"delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
		unset($_SESSION[qn]);
		header("Location: history.php");
		exit;
	}
	echo "<h1 class=head1> Review Test Question</h1>";
	if(!isset($_SESSION[qn]))
	{
			$_SESSION[qn]=0;
	}
	else if($submit=='Next Question' )
	{
		$_SESSION[qn]=$_SESSION[qn]+1;
	}
	$rs=mysqli_query($cn,"select * from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
	mysqli_data_seek($rs,$_SESSION[qn]);
	$row= mysqli_fetch_row($rs);
	?>
	<style>
	.green{
		color:green;
		font-weight:bold;
	}
	</style>
	<section style="padding-top:100px;padding-bottom:100px;">
					<div class="container">
						<h3 align="center" style="color:orange;">Result </h3>
						<div class="row align-items-center">
								<div class="card border-left-primary shadow col-md-12">
									<div class="card-body">
											<form name="myfm" method="post" action="review.php">
												<?php
													$n=$_SESSION[qn]+1;
												?>
												Question No. <?=$n;?>: <?php echo $row[2];?>
												<p <?php if($row[7]==1) echo "class='green'";?>> <?php if($row[7]==1) echo "Right Answer :";?>  <?php echo $row[3];?>  </p>
												<p <?php if($row[7]==2) echo "class='green'";?>> 
												<?php if($row[7]==2) echo "Right Answer :";?> <?php echo $row[4];?></p>
												<p <?php if($row[7]==3) echo "class='green'";?>> 
												<?php if($row[7]==3) echo "Right Answer :";?>  <?php echo $row[5];?></p>
												<p <?php if($row[7]==4) echo "class='green'";?>> 
												<?php if($row[7]==4) echo "Right Answer :";?> 
												<?php echo $row[6];?></p>
												<?php
												if($_SESSION[qn]<mysqli_num_rows($rs)-1)
												{	
												?>
												<input type=submit name=submit value='Next Question' class="btn btn-success">
												<?php
												}
												else{
												?>
												<input type=submit name=submit value='Finish' class="btn btn-success">
												<?php
												}
												?>
											</form>
									</div>
								</div>
						</div>
					</div>
	</section>

<?php
	include 'includes/footer.php';
?>
