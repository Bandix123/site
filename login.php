<?php
$login= $_POST["login"];
$email= $_POST["email"];
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Thanks for email";
} else {
echo "bad email";
} //check if email is asd@asd.asd


 ?>
