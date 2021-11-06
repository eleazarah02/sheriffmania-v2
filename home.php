<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inicio | Sheriffmania</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="icon" href="images/logo.png"/>
    </head>
    <body>
        <div class="container">
  <?php include 'menu.php' ?>   
<div class="container-fluid">
  <center><img src="images/logo.png" class="img-responsive" width="40%"></center>
  </div>
<div class="panel-footer">
            <center><p class="form-control">Eleazar Albino Hern&aacute;ndez&reg; Derechos Reservados &copy;<?php echo date('Y'); ?></p></center>
        <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
</div>
</div>
</body>
</html>