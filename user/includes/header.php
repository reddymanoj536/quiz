<?php
	include '../config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<title>Exam</title>
	<!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/one-page-wonder.min.css" rel="stylesheet">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77417952-1', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body>
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Online Exam</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
			<li class="nav-item" style="padding-right:10px;">
               <a class="nav-link btn btn-info btn-sm" href="index.php" style="color:#fff;font-size:15px;">Take Exam</a>
            </li>
			<li class="nav-item">
               <a class="nav-link btn btn-info btn-sm" href="history.php" style="color:#fff;font-size:15px;">History</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#" style="color:#fff;font-size:15px;">Welcome, <?php echo $_SESSION['username'];?></a>
            </li>
		    <li class="nav-item">
               <a class="nav-link btn btn-info btn-sm" href="logout.php" style="color:#fff;font-size:15px;">logout</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
    