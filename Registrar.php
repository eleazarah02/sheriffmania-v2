<?php
include("config.php");
include('class/userClass.php');
$userClass = new userClass();

$errorMsgReg='';
$errorMsgLogin='';

if (!empty($_POST['signupSubmit'])) 
{
$username=$_POST['usernameReg'];
$email=$_POST['emailReg'];
$password=$_POST['passwordReg'];
$name=$_POST['nameReg'];
$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$~i', $email);
$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

if($username_check && $email_check && $password_check && strlen(trim($name))>0) 
{
$uid=$userClass->userRegistration($username,$password,$email,$name);
if($uid)
{
	echo "<script>if(confirm('Cuenta creada correctamente')){
	document.location='index.php';}
	</script>";
}
else
{
$errorMsgReg="Usuario o correo electronico ya existen";
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="icon" href="images/logo.png"/>
	<title>Nuevo usuario | Sheriffmania</title>
</head>
<body>
	<div class="container">
	<div id="signup" class="card card-container">
	        <img id="profile-img" class="profile-img-card" src="images/logo.png" />
            <p id="profile-name" class="profile-name-card"></p>
<form method="post" action="" name="signup">
<input class="form-control" type="text" name="nameReg" autocomplete="off" placeholder="Nombre completo" />
<input class="form-control" type="text" name="emailReg" autocomplete="off" placeholder="Correo electr&oacute;nico" />
<input class="form-control" type="text" name="usernameReg" autocomplete="off" placeholder="Usuario" />
<input class="form-control" type="password" name="passwordReg" autocomplete="off" placeholder="Contrase&ntilde;a" />
<div class="errorMsg"><?php echo $errorMsgReg; ?></div>
<input type="submit" class="btn btn-primary" name="signupSubmit" value="Crear Cuenta">
</form>
<br>
<p>Ya tienes cuenta?  <a href="index.php">Inicia sesi&oacute;n.</a></p>
</div>
<div class="panel-footer">
            <center><p class="form-control">Eleazar Albino Hern&aacute;ndez&reg; Derechos Reservados &copy;<?php echo date('Y'); ?></p></center>
        </div>
</div>
<script src="js/jquery-1.11.2.min.js"></script>
		<script src="js/bootstrap.js"></script>
</body>
</html>
