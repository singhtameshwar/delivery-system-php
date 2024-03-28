<?php
session_start();
include("../../db/connection.php");
include("../../utils/function.php");

$user_id=
$sname = $_POST['sname'];
$sphone = $_POST['sphone'];
$semail = $_POST['semail'];
$pickup = $_POST['pickup'];
$rname = $_POST['rname'];
$rphone = $_POST['rphone'];
$remail = $_POST['remail'];
$delhiver = $_POST['delhiver'];
$product = $_POST['product'];
$photo = $_FILES['photo'];
$user_id = $_POST['user_id'];


if (isset($_FILES) && !empty($_FILES)) {

    $target_dir = "../../assets/images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if ($_FILES["photo"]["size"] > 500000) {
        $result = ['error' => true, 'message' => "your file is too large"];
        echo json_encode($result);
        exit();
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $result = ['error' => true, 'message' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."];
        echo json_encode($result);
        exit();
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        $result = ['error' => true, 'message' => "sorry your file was not uploaded"];
        echo json_encode($result);
        exit();
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $image = $_FILES["photo"]["name"];
        } else {
            $result = ['error' => true, 'message' => "there was an error in uploading image"];
            echo json_encode($result);
            exit();
        }
    }
}

$sql = "INSERT INTO orders (sender_name,sender_phone, sender_email,sender_address,receiver_name,receiver_phone,receiver_address,receiver_email,product_name,image,user_id)
VALUES ('$sname ', '$sphone ', '$semail','$pickup','$rname','$rphone','$delhiver','$remail','$product','$image','$user_id')";

if ($conn->query($sql) === TRUE) {
    $result = ['error' => false, 'message' => "done."];
    echo json_encode($result);
    exit();
} else {
    $result = ['error' => true, 'message' => "notdone"];
    echo json_encode($result);
    exit();
}

$conn->close();
