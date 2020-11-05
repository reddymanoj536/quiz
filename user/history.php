<?php
	include 'includes/header.php';
	extract($_SESSION);
?>
<section style="padding-top:100px;">
    <div class="container">
		<h1 align="center" style="color:orange;">Result History</h1>
        <div class="row align-items-center">
			<?php
				$rs=mysqli_query($cn,"select 
				s.sub_name,t.test_name,t.total_que,r.test_date,r.score from mst_test t, mst_result r, mst_subject as s where
				t.test_id=r.test_id and t.sub_id=s.sub_id and r.login='$login' order by r.id desc ");
			?>
			
			
			<table class="table table-bordered">
				<thead>
				  <tr>
					<th>Sl No</th>
					<th>Subject Name</th>
					<th>Test Name</th>
					<th>Total Question</th>
					<th>Score</th>
					<th>Date & Time</th>
				  </tr>
				</thead>
				<tbody>
				<?php
				$i=1;
				while($row=mysqli_fetch_array($rs))
				{
				?>
				  <tr>
					<td><?php echo $i;?></td>
					<td><?php echo $row['sub_name'];?></td>
					<td><?php echo $row['test_name'];?></td>
					<td><?php echo $row['total_que'];?></td>
					<td><?php echo $row['score'];?></td>
					<td><?php echo $row['test_date'];?></td>
				  </tr>
				  <?php
					$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
</section>
<?php
	include 'includes/footer.php';
?>
 