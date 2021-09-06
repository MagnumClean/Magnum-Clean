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
    <h2 style="text_align:center;"> Félicitations !</h2><br>
    <p><b>Votre compte a été activé avec succès.</b></p><br>
    <?php include 'checkCode.php';?>
    <p>Nous vous invitons de vous connecter avec l'identifiant : <b ><?php echo " ".$infos["email"];?></b> </p>
    <p> votre mot de passe est : <b> <?php echo " ".$infos["password"];?></b>. 
    </div>
  </div>
  <?php include 'footer.php';?>
  <p>© <?php echo date("Y");?> Magnum Clean. All rights reserved.</p> 
    </div>
  </div>
  <?php 
    
   
  ?>
</body>
</html>