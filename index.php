<?php
include("config.php");
include('class/userClass.php');
$userClass = new userClass();
$errorMsgReg='';
$errorMsgLogin='';

	if (!empty($_POST['loginSubmit'])) 
	{
		$usernameEmail=$_POST['usernameEmail'];
		$password=$_POST['password'];
		if(strlen(trim($usernameEmail))>1 && strlen(trim($password))>1 )
		{
			$uid=$userClass->userLogin($usernameEmail,$password);
			if($uid)
			{
				$url=BASE_URL.'home.php';
				header("Location: $url");
			}
			else
			{
				$errorMsgLogin="<div class='alert alert-danger alert-dismissible' role='alert'><strong>Error!</strong> Usuario o contrase&ntilde;a incorrectos, verifique sus datos</div>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css" media="screen,projection">
	<link rel="icon" href="images/logo.png"/>
	<title>Inicio | Sheriffmania</title>
</head>
<body>
	<div class="container">
<div id="login" class="card card-container">
	<img id="profile-img" class="profile-img-card" src="images/logo.png" />
    <p id="profile-name" class="profile-name-card"></p>
	<form class="form" method="post" action="" name="login">
		<input class="form-control" type="text" name="usernameEmail" autocomplete="off" placeholder="Usuario o correo" />
		<input class="form-control" type="password" name="password" autocomplete="off" placeholder="Contrase&ntilde;a" />
		<?php echo $errorMsgLogin; ?>
		<input type="submit" class="btn btn-primary" name="loginSubmit" value="Iniciar Sesi&oacute;n">
	</form>
<br>
<p>No tienes cuenta?  <a href="Registrar.php">registrate aqui.</a></p>
</div>

<div class="panel-footer">
            <center><p class="form-control">Eleazar Albino Hern&aacute;ndez&reg; Derechos Reservados &copy;<?php echo date('Y'); ?></p></center>
        </div>
</div>
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
