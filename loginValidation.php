<?php
    $requestPayLoad= file_get_contents('php://input');
    $account = json_decode($requestPayLoad);
    include 'database/db_connect.php';
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE email='$account->email' AND activationState='activated'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row)
    {
        $stmtr = $conn->prepare("SELECT * FROM accounts WHERE email='$account->email' AND password='$account->password'");
        $stmtr->execute();
        $rowr = $stmtr->fetch(PDO::FETCH_ASSOC);
        if($rowr){
        $validation = "true";
        }
        else 
        $validation = "wrong";
    }
    else {
        $validation = "false";
    }
    echo json_encode($validation); 
?>