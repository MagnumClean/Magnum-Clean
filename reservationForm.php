<?php
   
   include 'database/db_connect.php';
   $stmt = $conn->prepare("SELECT * FROM accounts WHERE email='$email' AND reservationNumber< 2 ");
   $stmt->execute();
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   if($row)
   {
       
   }
   else {
    echo '<p style="color: grey;">Vous ne pouvez créer que 2 réservations simultanément (pour plus de détails, vous pouvez nous contacter en tous moments). </p>';
   }

?>