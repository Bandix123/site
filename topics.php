<?php
  session_start();
$db = mysqli_connect('localhost', 'bondarenko', 'Sch00lS@ck3', 'site');
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }



 if (isset($_SESSION['success'])) :
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	endif

    <!-- logged in user information -->
      if (isset($_SESSION['username'])) :

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
      </form>
</table>
    </div>
    <button type="submit" class="btn" name="create_topic"> post </button>




    endif 
</div>
?>
