<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Magnum Clean</title>
  <meta charset="utf-8">
  <meta name="description" content="service de nettoyage des vitres, nettoyage industriel et nettoyage à domicile à Casablanca. Nouveau service de désinfection contre Corona Virus...">
  <meta name="keywords" content="magnum clean,nettoyage,clean,désinfection,service,casablanca,vitres,industriel,domicile,Corona">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,height=device-height, user-scalable=yes">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/headerStyle.css">
</head>
<body class="container-fluid ">
  <?php include 'header.php';?>
  <div class="row" style="height:600px">
    <div style="margin-top: 85px;background-color: #41aac8;height:400px;width:400px;  border: 1px solid black;border-radius: 10px;color: white;" class="mx-auto d-block p-5 verif"  >
    <h2 style="text_align:center;"> Finalisez votre inscription</h2><br>
    <p><b>Un e-mail vient de vous être envoyé.</b></p><br>
    <p>Pour finaliser votre inscription, rendez-vous dans votre boite e-mail pour activer votre compte. </p>
    </div>
  </div>
  <?php include 'footer.php';?>
  <p>© <?php echo date("Y");?> Magnum Clean. All rights reserved.</p> 
    </div>
  </div>
  <?php
$fname = $lname = $email = $extension = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["fname"]);
  $lname = test_input($_POST["lname"]);
  $email = test_input($_POST["uname"]);
  $extension = test_input($_POST["extension"]);
  $mobile = test_input($_POST["number"]);
  $countryCode = test_input($_POST["countryCode"]);
  $password = test_input($_POST["pswd"]);
  $email.=$extension;
  if( $mobile[0]=='0'){
    $mobile = substr($mobile, 1);
    $mobile='+'.$countryCode.$mobile;
  }
  else 
  $mobile='+'.$countryCode.$mobile;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function createRandomPassword() { 

  $chars = "abcdefghijkmnopqrstuvwxyz0123456789%"; 
  srand((double)microtime()*1000000); 
  $i = 0; 
  $pass = '' ; 

  while ($i <= 20) { 
      $num = rand() % 33; 
      $tmp = substr($chars, $num, 1); 
      $pass = $pass . $tmp; 
      $i++; 
  } 

  return $pass; 

} 
$codeGenerated= createRandomPassword();
?>
  <?php 
    include 'database/db_connect.php';
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE email='$email'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!$row)
    {
    $reservationNumber=0;
    $sql = "INSERT INTO accounts (firstName, lastName, email,mobile,password,activationState,reservationNumber)
    VALUES ('$fname','$lname','$email','$mobile','$password','$codeGenerated',$reservationNumber)";
    $conn->exec($sql);
   


    require_once 'mail.php';
  $mail->setFrom('wadsl884@gmail.com', 'Magnum Clean');
  $mail->addAddress($email);
  $mail->Subject = 'Confirmation de votre Compte';
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
    <div>
    <div id="box" style="background-color: #41aac8;margin-top: 10px; border: 3px solid white; border-radius: 20px;color: white;text-align: center;" >
      <h2> VALIDATION DU COMPTE</h2>
      <p>Bonjour<bold> '.$fname.'!</bold> Merci pour votre inscription à notre service.</p><p>Cliquez sur le lien suivant pour valider votre compte.</p>
      <p><a href="http://localhost/MagnumClean/activationDonePage.php?code='.$codeGenerated.'" style="margin-top:20px;padding:8px 20px;border-radius: 30px;background-color: white;color:  #41aac8;text-decoration:none;">Vérifier</a></p>
      <br><p>Magnup Clean Team.</p>
      </div>
  </body>';
  $mail->send();
  $mail->smtpClose();



    }
  
  ?>

</body>
</html>