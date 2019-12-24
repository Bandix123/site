<?php
include('server.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add a topic</title>
	<link rel="stylesheet" type="text/css" href="add.css">
</head>
<body>

<div class="header">

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

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>

     <div class="Add">
      <table>
        <form action="add_topic.php" method="post">
<tr>
  <td>Add a title:</td>
  <td> <input type="text" name="subject"> </td>
</tr>
<tr>
  <td>Write a discription:</td>
  <td> <input type="text" name="discription"> </td>
</tr>
<!--<tr>
  <td>Add a picture:</td>
  <td> <input type="file" name="img"> </td>
</tr> -->
<tr>

<input type="submit" class="button" name="create_topic" value="post">
</tr>
      </form>
</table>
    </div>





    <?php endif ?>
</div>



</body>
</html>
