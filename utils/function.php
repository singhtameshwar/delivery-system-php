<?php

function pr( $data){
    echo '<pre>';  
    print_r($data);
    echo '</pre>';
}

function if_user_logged_in( $data ){
    if( isset( $data['id'] ) &&  isset($data['check']) && $data['check'] == 'logged_in' ) {
        return true;
    }else {
        return false;
    }
}

function get_user_data($user_id, $conn) {
    $response = [];
    $sql = "SELECT * FROM user WHERE id = $user_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $response = $result->fetch_assoc();
    }
    return $response;
}   
