<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();
$statusu = "user";
$statusa = "admin";
$topic = "";
$description = "";

// connect to the database
$db = mysqli_connect('localhost', 'bondarenko', 'Sch00lS@ck3', 'test');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password,status)
  			  VALUES('$username', '$email', '$password', '$statusu')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: mainpage.php');
  }
}




if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: mainpage.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}



if (isset($_POST['create_topic'])) {
  $subject = mysqli_real_escape_string($db,$_POST['subject']);
  $description = mysqli_real_escape_string($db,$_POST['discription']);
$username = $_SESSION['username'];
$topic = $_SESSION['topic'];
  if (empty($subject)) {
array_push($errors, "Write a subject");
  }
  if (empty($description)) {
array_push($errors,"Write a discription");
  }

  if(count($errors) ==0){
    $sql = "INSERT INTO topics (`topic_title`,`topic_description`,`topic_by`)
    VALUES ('$subject','$description','$username')";
    if ($db -> query($sql) == TRUE){
      echo "success";
    } else {
      echo "Error";
    }

  }
}


if (isset($_POST['create_comment'])) {
  $text = mysqli_real_escape_string($db, $_POST['comment']);
  $topic = $_SESSION['topic'];
  $i = $_POST['$i'];
  if (empty($text)){
    array_push($errors,"Write a comment");
  }

if (count($errors) == 0){
  $sql = "INSERT INTO comments (`comment_text`, `comment_topic`)
        VALUES ('$text', '$topic')";
        if ($db -> query($sql) == TRUE){
          echo "success";
        } else {
          echo "Error";
        }
      }
}

if (isset($_POST['rating'])){

  $star = mysqli_real_escape_string($db,$_POST['rate']);

  $sql = "INSERT INTO rating (`number`) VALUES ('$star') ";
  if ($db -> query($sql) == TRUE){
          echo "success";
        } else {
          echo "Error"; }
      }











?>
