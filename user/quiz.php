<?php
//error_reporting(1);
include 'includes/header.php';
extract($_POST);
extract($_GET);
extract($_SESSION);
	

if(isset($subid) && isset($testid))
{
	$_SESSION[sid]=$subid;
	$_SESSION[tid]=$testid;
	header("location:quiz.php");
}
$test_id=$_SESSION[tid];
$td=mysqli_query($cn,"select * from mst_test where test_id=$test_id") or die(mysqli_error());
$db_td= mysqli_fetch_array($td);
$totaltime=$db_td['exam_duration'];
if(isset($timepassed) && $timepassed > 0 ){
	$totaltime = $timepassed;
}

if(!isset($_SESSION[sid]) || !isset($_SESSION[tid]))
{
	header("location: index.php");
}
$query="select * from mst_question ORDER BY RAND ( )";
$rs=mysqli_query($cn,"select * from mst_question where test_id=$tid ORDER BY RAND ( )") or die(mysqli_error());
if(!isset($_SESSION[qn]))
{
	$_SESSION[qn]=0;
	mysqli_query($cn,"delete from mst_useranswer where sess_id='" . session_id() ."'") or die(mysqli_error());
	$_SESSION[trueans]=0;
	
}
else
{	
		if($next=='Next Question' && isset($ans))
		{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($cn,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($next=='Skip Question')
		{
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
			//	mysqli_query($cn,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysqli_error());
				//if($ans==$row[7])
				//{
					  $_SESSION[trueans]=$_SESSION[trueans];
			  //}
				$_SESSION[qn]=$_SESSION[qn]+1;
				$_SESSION[skip]=$_SESSION[skip]+1;
				
		}
		else if($getresult=='Get Result' && isset($ans))
		{
				date_default_timezone_set("Asia/Calcutta");
				$date_time = date("Y-m-d H:i:s");
 
				mysqli_data_seek($rs,$_SESSION[qn]);
				$row= mysqli_fetch_row($rs);	
				mysqli_query($cn,"insert into mst_useranswer(sess_id, test_id, que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('".session_id()."', $tid,'$row[2]','$row[3]','$row[4]','$row[5]', '$row[6]','$row[7]','$ans')") or die(mysql_error());
				if($ans==$row[7])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				?>
				<section style="padding-top:100px;">
					<div class="container">
						<h3 align="center" style="color:orange;">Result </h3>
						<div class="row align-items-center">
								<div class="card border-left-primary shadow col-md-12">
									<div class="card-body">
										<?php $_SESSION[qn]=$_SESSION[qn]+1; ?>	
										<table class="table table-bordered">
											<tbody>
												<tr>
													<td>Total Question:</td>
													<td><?php echo $_SESSION[qn];?></td>
												</tr>
												<tr>
													<td>True Answer:</td>
													<td><?php echo $_SESSION[trueans];?></td>
												</tr>
												<tr>
													<td>Wrong Answer:</td>
													<td>
													<?php 
														$w=$_SESSION[qn]-$_SESSION[trueans];
														echo $w;
													?></td>
												</tr>
											</tbody>
										</table>
										<?php
										mysqli_query($cn,"insert into mst_result(login,test_id,test_date,score) values('$login',$tid,'$date_time',$_SESSION[trueans])") or die(mysqli_error());
										?>
											<h4 align=center><a href=review.php> Review Question</a> </h1>
										
									</div>
								</div>
						</div>
					</div>
			`	</section>
				<?php
				
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				exit;
		}
}
$rs=mysqli_query($cn,"select * from mst_question where test_id=$tid") or die(mysqli_error());
if($_SESSION[qn]>mysqli_num_rows($rs)-1)
{
unset($_SESSION[qn]);
?>
				<section style="padding-top:100px;">
					<div class="container">
						<h3 align="center" style="color:orange;">Error </h3>
						<div class="row align-items-center">
								<div class="card border-left-primary shadow col-md-12">
									<div class="card-body">
										<h4 class=head1>Some Error  Occured</h4>
										<?php echo session_destroy();?>
										Please <a href=index.php> Start Again</a>
									</div>
								</div>
						</div>
					</div>
			`	</section>
<?php
exit;
}
mysqli_data_seek($rs,$_SESSION[qn]);
$row= mysqli_fetch_row($rs);
$sb_ex=mysqli_query($cn,"select * from mst_test as t,mst_subject as s where t.sub_id=s.sub_id and t.test_id=$test_id") or die(mysqli_error());
$db_sb_ex= mysqli_fetch_array($sb_ex);
?>

<section style="padding-top:100px;">
    <div class="container">
		
			<h4 align="center" style="color:grey;">Subject Name: <span style="color:orange;"><?php echo $db_sb_ex['sub_name'];?></span> Exam Name: <span style="color:orange;"><?php echo $db_sb_ex['test_name'];?></span></h4>
		
        <div class="row align-items-center">
			    <div class="card border-left-primary shadow col-md-12">
					<div class="card-body">
							<form id="myfm" name=myfm method=post action=quiz.php>
							<?php $n=$_SESSION[qn]+1; ?>
							<div class="row">
								<div class="col-md-10">
									<p style="color:grey;font-size:18px;"><b><span style="color:orange;">Question No <?php echo $n;?>.</span> <?php echo $row[2];?></b></p>
								</div>
								<div class="col-md-2">
									<span id="timer" class="btn btn-warning" style="color:#fff;font-weight:bold;">01:00</span>
								</div>
							</div>	
							<hr>
							<input type="hidden" id="timepassed" name="timepassed" value="">
							<input type=radio name=ans value=1> <span style="font-size:18px;"><?php echo $row[3];?></span><br><br>
							<input type=radio name=ans value=2> <span style="font-size:18px;"><?php echo $row[4];?></span><br><br>
							<input type=radio name=ans value=3> <span style="font-size:18px;"><?php echo $row[5];?></span><br><br>
							<input type=radio name=ans value=4> <span style="font-size:18px;"><?php echo $row[6];?></span><br><br>
							<?php
								if($_SESSION[qn]<mysqli_num_rows($rs)-1){
							?>
								<button type="submit" name="next" class="btn btn-success" value="Next Question">Next Question</button>
							<?php
							}
							else{
								?>
								<button type="submit" name="getresult" class="btn btn-success" value="Get Result">Get Result</button>
							<?php
							}
							?>
							<br>
							<br>
							<div class="alert alert-warning" >
								<strong>Note:</strong> Do Not Refresh the Page.
							</div>
						
					</div>
                </div>
        </div>
    </div>
</section>
<br>
<br>


<?php
include 'includes/footer.php';
?>
<script>
$(document).ready(function(){
	var totaltime ="<?php echo $totaltime ?>";
		totaltime= parseFloat(totaltime).toFixed(2);
	var duration = 60*totaltime;
	var timer = duration, minutes, seconds;
  var x = setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

         $("#timer").text(minutes + ":" + seconds);
		 $("#timepassed").val((timer-1)/60);
        if (--timer < 0) {

					clearInterval(x);
					var getres = document.createElement("input");
					getres.setAttribute("type", "hidden");
					getres.setAttribute("name", "getresult");
					getres.setAttribute("value", "Get Result");
					var ans = document.createElement("input");
					ans.setAttribute("type", "hidden");
					ans.setAttribute("name", "ans");
					ans.setAttribute("value", 0);
					$('#myfm').append(getres);
					$('#myfm').append(ans);
					$('#myfm').submit();
					
        }
    }, 1000);
})

</script>