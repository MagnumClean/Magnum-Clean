
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
<?php
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["uname"]);
  $extension = test_input($_POST["extension"]);
  $email.=$extension;
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<body class="container-fluid ">
  <?php include 'header.php';?>
  <div class="p-3 container" style="min-height: 400px;">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#myReservations">Mes réservations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " data-toggle="tab" href="#newReservation">Nouvelle réservation</a>
      </li>
    </ul>
    <div class="tab-content">
      <div id="myReservations" class="container tab-pane active">
        <br>
        <div style="display:inline-block;overflow-x:auto;max-width:100%;">
        <?php
          include 'reservationTable.php';
        ?>
        </div>
      </div>
      <div id="newReservation" class="container tab-pane fade">
        <br>
        <?php
          include 'reservationForm.php';
        ?>
      </div>
    </div>
  </div>
  <?php include 'footer.php';?>
  <p>© <?php echo date("Y");?> Magnum Clean. All rights reserved.</p> 
    </div>
  </div>
  
</body>
</html>