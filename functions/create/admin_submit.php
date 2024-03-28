<?php
include("../../db/connection.php");
include("../../utils/function.php");

$username = $_POST['username'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$enc_pass = md5($password);
$cpass = $_POST['cpass'];
$email=$_POST['email'];

if ($password != $cpass) {
    $result = ['error' => true, 'message' => "Your password does not match."];
    echo json_encode($result);
    exit();
}

$sql = "INSERT INTO admin (username, phone, email,password)
VALUES ('$username', '$phone', '$email','$enc_pass')";

if ($conn->query($sql) === TRUE) {
    $result = ['error' => false, 'message' => "new record created successfull"];
    echo json_encode($result);
    exit();
} else {
    $result = ['error' => true, 'message' => "
    $conn->error"];
    echo json_encode($result);
    exit();
}

$conn->close();
