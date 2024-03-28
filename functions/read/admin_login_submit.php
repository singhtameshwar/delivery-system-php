<?php
include("../../db/connection.php");
include("../../utils/function.php");


$email = $_POST['email'];
$password = $_POST['password'];
$enc_pass = md5($password);


$sql = "SELECT * from admin WHERE (email='$email'OR username='$email' AND password='$enc_pass')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $data = $row = $result->fetch_assoc();

    $_SESSION['id'] =  $data['id'];
    $_SESSION['check'] =  'logged_in';

    $result = ['error' => false, 'message' => "done"];

    echo json_encode($result);
    exit();
} else {
    $result = ['error' => true, 'message' => "sorry invalid username or password."];
    echo json_encode($result);
    exit();
}

$conn->close();
