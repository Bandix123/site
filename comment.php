<?php
include('server.php');
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Comment</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Comment now</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

</div>


<hr />


<div id="content">



<form action="comment.php" method="post">
  <?php include('errors.php'); ?>
Write a comment: <input type="textarea" name="comment"> <br>
<input type="submit" name="create_comment">

</form>

<h1>  <a href="forum.php"> go to forum </a> </h1>













</div>

</body>
</html>
