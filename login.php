<?php
require('mysqlconnect.php');
session_start();

if (isset($_POST['username'])){
        
 $username = stripslashes($_REQUEST['username']);

 $username = mysqli_real_escape_string($con,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password).
 $result = mysqli_query($con,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
          
     header("Location: mainpage.html");
         }else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.html'>Login</a></div>";
 }
}else{
  header ("Location: login.html");
}
?>
