<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM users;");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>
<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
$active_usuarios="active";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Usuarios | Sheriffmania</title>
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
			<a class="btn btn-success" href="./agregarUsuario.php"><img src="images/nuevousuario.png" alt="" width="40" height="40">Crear nuevo usuario</a>
		</div>
		<br>
		<div class="table-responsive">
		<table class="table table-hover table-dark" border="2">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Correo electr&oacute;nico</th>
					<th>Usuario</th>
					<th>Contrase&ntilde;a</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($usuarios as $Usuario){ ?>
				<tr>
					<td><?php echo $Usuario->uid ?></td>
					<td><?php echo $Usuario->name ?></td>
					<td><?php echo $Usuario->email ?></td>
					<td><?php echo $Usuario->username ?></td>
					<td><?php echo $Usuario->password ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editarUser.php?id=" . $Usuario->uid?>"><i class="glyphicon glyphicon-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarUser.php?id=" . $Usuario->uid?>"><i class="glyphicon glyphicon-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php include_once "pie.php" ?>