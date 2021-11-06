<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
$active_productos="active";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Productos | Sheriffmania</title>
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
			<a class="btn btn-success" href="./agregarProducto.php"><img src="images/nuevoproducto.png" alt="" width="40" height="40"> Agregar nuevo producto</a>
		</div>
		<br>
		<div class="table-responsive">
		<table class="table table-responsive table-hover" border="2">
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de compra</th>
					<th>Precio de venta</th>
					<th>Existencia</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioCompra ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->existencia ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>"><i class="glyphicon glyphicon-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id?>"><i class="glyphicon glyphicon-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
<?php include_once "pie.php" ?>