<?php 

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $activationCode = $_GET["code"];
    include 'database/db_connect.php';
    
  
    
    $stmt = $conn->prepare("SELECT email,password FROM accounts WHERE activationState='$activationCode'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row){
    
      class TableRows extends RecursiveIteratorIterator {
        function __construct($it) {
          parent::__construct($it, self::LEAVES_ONLY);
        }
      } 
      $stmt2 = $conn->prepare("SELECT email,password FROM accounts WHERE activationState='$activationCode'");
      $stmt2->execute();
      $result = $stmt2->setFetchMode(PDO::FETCH_ASSOC);
      $infos= array("email"=>"","password"=>"");
      foreach (new TableRows(new RecursiveArrayIterator($stmt2->fetchAll())) as $k=>$v) {
            $infos[$k]=$v;
      }

      $sql = "UPDATE accounts SET activationState='activated' WHERE activationState='$activationCode' ";
      $stmt3 = $conn->prepare($sql);
      $stmt3->execute();
      require_once 'mail.php';
      $mail->setFrom('wadsl884@gmail.com', 'Magnum Clean');
      $mail->addAddress($infos["email"]);
      $mail->Subject = 'Compte activé';
      $mail->AddEmbeddedImage('media/whiteLogo.png','whiteLogo');
      $mail->Body = '
      <head>
      <style>
      @media only screen and (min-width: 768px){ 
        img { margin-left:300px;}
        #box { width: 46%;margin:300px}
      }
      </style>
      </head>
        <body >
        <div>
              <div>  
                <img style="margin-top: 25px;border-radius: 20px;" src="cid:whiteLogo" alt="MagnumClean_logo">
              </div>   
        </div>
        <div id="box" style="background-color: #41aac8;margin-top: 10px; border: 3px solid white; border-radius: 20px;color: white;text-align: center;" >
        <h2 style="text_align:center;"> Félicitations !</h2><br>
        <p><b>Votre compte a été activé avec succès.</b></p><br>
        <p>Nous vous invitons de vous connecter avec l\'identifiant : <b>'.$infos["email"].'</b> </p>
        <p> votre mot de passe est : <b>'.$infos["password"].'</b>. 
          <br><p>Magnup Clean Team.</p>
          </div>
      </body>';
      $mail->send();
      $mail->smtpClose();
      }
}
?>