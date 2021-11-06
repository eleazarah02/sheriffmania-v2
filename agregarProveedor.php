<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
$active_proveedores="active";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Agregar Proveedor | Sheriffmania</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/logo.png"/>
  <link href="css/bootstrap.css" rel="stylesheet">
    </head>
<body>
	<div class="container">
		<?php include 'menu.php' ?> 

<div class="container-fluid">
	<h1>Nuevo proveedor</h1>
	<form method="post" action="nuevoProveedor.php">
		<label for="nombre">Nombre del proveedor:</label>
		<input class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre del proveedor">

		<label for="dir">Dirección:</label>
		<textarea required id="dir" name="dir" cols="30" rows="5" class="form-control"></textarea>

		<label for="telefono">Telefono:</label>
		<input class="form-control" name="telefono" required type="text" id="telefono" maxlength="10" placeholder="Telefono del proveedor">

		<br><br><input class="btn btn-success" type="submit" value="Guardar"><br>
	</form>
</div>
<br>
<?php include_once "pie.php" ?>