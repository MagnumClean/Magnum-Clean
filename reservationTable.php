<?php
    
    
    include 'database/db_connect.php';
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE email='$email' AND reservationNumber> 0 ");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row)
    {
        echo "<table class=\"table table-hover\" >";
        echo "<tr><th>Type du service</th><th>Type d'environnement</th><th>Espace à nettoyer</th>
        <th>Nombre d'étage</th><th>Date de nettoyage</th><th>Numéro à contacter</th><th>Date de réservation</th></tr>";
        
        class TableRows extends RecursiveIteratorIterator {
          function __construct($it) {
            parent::__construct($it, self::LEAVES_ONLY);
          }
        
          function current() {
            return "<td>" . parent::current(). "</td>";
          }
        
          function beginChildren() {
            echo "<tr>";
          }
        
          function endChildren() {
            echo "</tr>" . "\n";
          }
        }
        try {
          $stmt2 = $conn->prepare("SELECT serviceType,environmentType,spaceToClean,floorNumber,cleaningDate,contactPhoneNumber,reservation_date FROM reservations WHERE email='$email'");
          $stmt2->execute();
          $result = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
          foreach(new TableRows(new RecursiveArrayIterator($stmt2->fetchAll())) as $k=>$v) {
            echo $v;
          }
        } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";
    }
    else{
        echo '<p style="color: grey;">Aucune réservation n\'est encore créée. </p>';
    }
    

?>