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
<body class="container-fluid">
  <?php include 'header.php';?>
  <div class="p-5 container">
    <form onsubmit="return validateForm();" name="signup" style="margin-top:15px" action="<?php echo htmlspecialchars("signupDonePage.php");?>" method="POST" class="ned mx-auto d-block" novalidate>
    <div class="form-group">
      <label for="fname">Prénom:</label>
      <input type="text" class="form-control"  maxlength="20" id="fname" placeholder="Tapez votre prénom.." name="fname" required>
    </div>
    <p id="fnameAlert"></p>
    <div class="form-group">
      <label for="lname">Nom:</label>
      <input type="text" class="form-control" id="lname" maxlength="25" placeholder="Tapez votre nom.." name="lname" required>
    </div>
    <p id="lnameAlert"></p>

    <div class="form-group">
      <label for="email">E-mail:</label>
      <div class="input-group">
      <input type="text" class="form-control" id="uname" maxlength="25" placeholder="identifiant" name="uname" required>
      <input type="text" class="form-control" name="extension" maxlength="20" placeholder="@gmail.com" required>
      </div>
    </div>
    <p id="emailAlert"></p>
    <div class="form-group">
      <label for="number">Tel:</label>
      <div class="input-group">
      <?php include 'countryCodeList.php>'; ?>
      <input type="text" class="form-control" id="number" name="number" maxlength="30" placeholder="06...." required>
      </div>
    </div>
    <p id="numberAlert"></p>
    <div class="form-group">
      <label for="pwd">Mot de passe:</label>
      <input type="password" class="form-control" id="pwd" maxlength="30" placeholder="Choisissez votre mot de passe.." name="pswd" required>
    </div>
    <p id="pswdAlert"></p>
    <div class="form-group">
      <label for="pwdConf">Confirmer votre mot de passe:</label>
      <input type="password" class="form-control" id="pwdConf" maxlength="30" placeholder="Confirmez votre mot de passe.." name="pswdConf" required>
    </div>
    <p id="pswdConfAlert"></p>
    <button type="submit"  style="background-color: #41aac8;" class="btn">Envoyer</button>
    </form>
    <script src="script/signupValidation.js"></script>
  </div>


  <?php include 'footer.php';?>
  <p>© <?php echo date("Y");?> Magnum Clean. All rights reserved.</p> 
    </div>
  </div>
  
</body>
</html>