<?php

$login= $_POST["login"];
$email= $_POST["email"];
$pasword= $_POST["password"];
$password_check= $_POST["check"];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  if ($password=$check){
  $sql = "INSERT INTO users (username, email,password)
  VALUES ('login','email','password')";

  echo "Registred succesfully";
}} else {
echo "Error";
}

 ?>
