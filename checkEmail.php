<?php
    $requestPayLoad= file_get_contents('php://input');
    $email = json_decode($requestPayLoad);
    include 'database/db_connect.php';
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE email='$email'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row)
    {
        $existEmail = "true";
        echo json_encode($existEmail);
    }
    else {
        $existEmail = "false";
        echo json_encode($existEmail);
    }
       
?>
