<?php
	include '../config/database.php';
	include '../config/access.php';
	$total_que=$_POST['total_que'];
	$test_id=$_POST['test_id'];
	$rs=mysqli_query($cn,"select que_id from mst_question where test_id=$test_id");
	$row=mysqli_fetch_array($rs);
	$que_id=$row['que_id'];
	$questions_name=$_POST["questions_name"];
	$option_one=$_POST["option_one"];
	$option_two=$_POST["option_two"];
	$option_three=$_POST["option_three"];
	$option_four=$_POST["option_four"];
	$right_answer=$_POST["right_answer"];
			for($i=0;$i<$total_que;$i++){
				$update_id=$que_id+$i;
				$sql = "UPDATE `mst_question` SET `que_desc`='$questions_name[$i]',
				`ans1`='$option_one[$i]',`ans2`='$option_two[$i]',`ans3`='$option_three[$i]',`ans4`='$option_four[$i]',
				`true_ans`='$right_answer[$i]' where que_id=$update_id";
				echo "UPDATE `mst_question` SET `que_desc`='$questions_name',
				`ans1`='$option_one[$i]',`ans2`='$option_two[$i]',`ans3`='$option_three[$i]',`ans4`='$option_four[$i]',
				`true_ans`='$right_answer[$i]' where que_id=$update_id";
				mysqli_query($cn, $sql);
			} 
			header('Location: add_questions.php?status=succ&test_id='.$test_id);
	  
?>