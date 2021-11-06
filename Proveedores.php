<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM proveedor;");
$proveedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
$active_proveedores="active";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Proveedores | Sheriffmania</title>
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
			<a class="btn btn-success" href="./agregarProveedor.php"><img src="images/nuevoProveedor.png" alt="" width="40" height="40"> Agregar nuevo proveedor</a>
		</div>
		<br>
		<div class="table-responsive">
		<table class="table table-hover table-responsive" border="2">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Direcci&oacute;n</th>
					<th>Telefono</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($proveedores as $proveedor){ ?>
				<tr>
					<td><?php echo $proveedor->id?></td>
					<td><?php echo $proveedor->nombre ?></td>
					<td><?php echo $proveedor->direccion ?></td>
					<td><?php echo $proveedor->telefono ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editarProveedor.php?id=" . $proveedor->id?>"><i class="glyphicon glyphicon-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarProveedor.php?id=" . $proveedor->id?>"><i class="glyphicon glyphicon-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php include_once "pie.php" ?>