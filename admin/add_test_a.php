<?php
	include '../config/database.php';
	include '../config/access.php';
	$subject_id=$_POST['subject_id'];
	$exam_name=$_POST['exam_name'];
	$total_questions=$_POST['total_questions'];
	$exam_duration=$_POST['exam_duration'];
	$test_id=$_POST['test_id'];
	if($_POST['mode']==1){
		$sql = "INSERT INTO `mst_test`(`sub_id`, `test_name`, `total_que`, `exam_duration`,`status`) VALUES ($subject_id,'$exam_name',$total_questions,$exam_duration,0)";
		if (mysqli_query($cn, $sql)) {
				$last_id = mysqli_insert_id($cn);
				for($i=0;$i<$total_questions;$i++){
					$sql = "INSERT INTO `mst_question`(`test_id`) VALUES ($last_id)";
					mysqli_query($cn, $sql);
				}
				header('Location: add_questions.php?status=200&test_id='.$last_id);
		}
	}
	if($_POST['mode']==2){
		$sql = "UPDATE `mst_test` SET `test_name`='$exam_name' WHERE test_id=$test_id";
		if (mysqli_query($cn, $sql)) {
			header('Location: exam_list.php?status=200');
		}
	}
?>