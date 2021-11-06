<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
$active_vender="active";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Vender | Sheriffmania</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="icon" href="images/logo.png"/>
    </head>
<body>
	<div class="container">
		<?php include 'menu.php' ?> 
<?php 
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>

	<div class="container-fluid">
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Venta realizada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El producto est&aacute; agotado
						</div>
					<?php
				}else if($_GET["status"] === "6"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>Se termino este producto, elige otro
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo sali&oacute; mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
		<br>
		<form method="post" action="agregarAlCarrito.php">
			<label for="codigo">C&oacute;digo del producto:</label>
			<input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el c&oacute;digo">
		</form>
		<br><br>
		<div class="table-responsive">
		<table class="table table-hover table-responsive" border="2">
			<thead>
				<tr>
					<th>ID</th>
					<th>C&oacute;digo</th>
					<th>Descripci&oacute;n</th>
					<th>Precio de venta</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito"] as $indice => $producto){ 
						$granTotal += $producto->total;
					?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->cantidad ?></td>
					<td><?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="glyphicon glyphicon-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
		<h3 class="form-control">Total: <?php echo $granTotal; ?></h3>
		<form action="./terminarVenta.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit" class="btn btn-success">Terminar venta</button>
			<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
		</form>
		<br>
	</div><br>
<?php include_once "pie.php" ?>