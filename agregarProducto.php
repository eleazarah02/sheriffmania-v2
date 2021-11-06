<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
$active_productos="active";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Agregar Producto | Sheriffmania</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/logo.png"/>
  <link href="css/bootstrap.css" rel="stylesheet">
    </head>
<body>
	<div class="container">
		<?php include 'menu.php' ?> 

<div class="container-fluid">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php" class="form">
		<label for="codigo">C&oacute;digo del producto:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el c&oacute;digo">

		<label for="descripcion">Descripci&oacute;n:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>

		<label for="precioVenta">Precio de venta:</label>
		<input class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">

		<label for="precioCompra">Precio de compra:</label>
		<input class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra">

		<label for="existencia">Existencia:</label>
		<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
		<br><br><input class="btn btn-success" type="submit" value="Guardar"><br>
	</form>
</div><br><br>
<?php include_once "pie.php" ?>