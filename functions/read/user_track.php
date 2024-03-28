<?php
session_start();

include("../../db/connection.php");
$user_id =  $_SESSION['id'];


if (isset($_POST['action']) && $_POST['action'] == 'get_all_users') {

  $sql = "SELECT * FROM orders where user_id='$user_id'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = array(
        'id' => $row['id'],
        'sender_name' => $row['sender_name'],
        'sender_email' => $row['sender_email'],
        'sender_phone' => $row['sender_phone'],
        'sender_address' => $row['sender_address'],
        'receiver_name' => $row['receiver_name'],
        'receiver_email' => $row['receiver_email'],
        'receiver_phone' => $row['receiver_phone'],
        'receiver_address' => $row['receiver_address'],
        'status' => $row['status'],
        'image' => $row['image'],
      );
    }
    echo json_encode(array('success' => true, 'data' => $data));
  } else {
    echo json_encode(array('success' => "bhai",));
  }
} else {
  echo json_encode(array('success' => "hello",));
}

mysqli_close($conn);
