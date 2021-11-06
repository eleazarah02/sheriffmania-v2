<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.id = productos_vendidos.id_producto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
$active_ventas="active";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ventas | Sheriffmania</title>
        <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="icon" href="images/logo.png"/>
    </head>
<body>
	<div class="container">
		<?php include 'menu.php' ?> 
	<div class="container-fluid">
		<div>
			<a class="btn btn-success" href="./vender.php"><img src="images/nuevaVenta.png" alt="" width="40" height="40"> Agregar nueva venta</a>
		</div>
		<br>
		<div class="table-responsive">
		<table class="table table-hover table-responsive" border="2">
			<thead>
				<tr>
					<th>N&uacute;mero</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>C&oacute;digo</th>
									<th>Descripci&oacute;n</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $venta->id?>"><i class="glyphicon glyphicon-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
<?php include_once "pie.php" ?>