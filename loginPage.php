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
  <div class="p-5 container" style="min-height: 400px;">
    <form onsubmit="return validateLogin();" method="POST" name="login" style="margin-top:15px" action="<?php echo htmlspecialchars("reservationPage.php");?>" class=" mx-auto d-block" novalidate>
    <div class="form-group ">
        <label for="uname">Identifiant:</label>
        <div class="input-group">
            <input type="text" class="form-control" id="uname" placeholder="identifiant" name="uname" required>
            <input type="text" class="form-control" name="extension" placeholder="@gmail.com" required>
        </div>
    </div>
    <p id="unameAlert"></p>
    <div class="form-group">
      <label for="pswd">Mot de passe:</label>
      <input type="password" class="form-control" id="pswd" placeholder="Tapez votre mot de passe.." name="pswd" required>
    </div>
    <p id="pswdAlert"></p>
    <button type="submit" style="background-color: #41aac8;" class="btn">Connexion</button>
    </form>
  </div>
  
    <?php include 'footer.php';?>
    <p>© <?php echo date("Y");?> Magnum Clean. All rights reserved.</p> 
    </div>
  </div>
  <script src="script/loginValidation.js"></script>
 
</body>
</html>