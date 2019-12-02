<?php
require('mysqlconnect.php');

if (isset($_REQUEST['username'])){

 $username = stripslashes($_REQUEST['username']);

 $username = mysqli_real_escape_string($con,$username);
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($con,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 $trn_date = date("Y-m-d H:i:s");
       $query = "INSERT into `users` (user_name, user_pass, user_email, user_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
      header ("Location: registration.html");
    }
      ?>
