<?php

include("../../db/connection.php");
include("../../utils/function.php");

$username=$_POST['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$enc_pass=md5($password);
$cpass=$_POST['cpass'];


if($password != $cpass){
  $result = [ 'error' => true , 'message' => "Your password does not match." ];
  echo json_encode($result);
  exit();
}

$sql = "INSERT INTO user (username, email, phone,password)
VALUES ('$username', '$email', '$phone','$enc_pass')";

if ($conn->query($sql) === TRUE) {
  $result = [ 'error' => false , 'message' => "new record created successfull." ];
  echo json_encode($result);
  exit();
 
} else {
  $result = [ 'error' => true , 'message' => ". $conn->error" ];
  echo json_encode($result);
  exit();
}

$conn->close();
?>