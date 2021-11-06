<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM users WHERE uid = ?;");
$sentencia->execute([$id]);
$usuario = $sentencia->fetch(PDO::FETCH_OBJ);
if($usuario === FALSE){
	echo "¡No existe algún usuario con ese ID!";
	exit();
}
$active_usuarios="active";
?>
<?php include_once "encabezado.php" ?>
	<div class="container-fluid">
		<h1>Editar usuario con el ID <?php echo $usuario->uid; ?></h1>
		<form method="post" action="guardarUser.php">
			<input type="hidden" name="id" value="<?php echo $usuario->uid; ?>">
	
			<label for="nombre">Nombre:</label>
			<input value="<?php echo $usuario->name ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre">

			<label for="email">Correo electr&oacute;nico:</label>
			<input value="<?php echo $usuario->email ?>" required id="email" name="email" type="email" class="form-control" placeholder="Correo electr&oacute;nico">

			<label for="usuario">Usuario:</label>
			<input value="<?php echo $usuario->username ?>" class="form-control" name="usuario" required type="text" id="usuario" placeholder="Usuario">

			<label for="password">Contrase&ntilde;a:</label>
			<input value="<?php echo $usuario->password ?>" class="form-control" name="password" required type="text" id="password" placeholder="Contrase&ntilde;a">
			<br><br><input class="btn btn-success" type="submit" value="Guardar cambios">
			<a class="btn btn-danger" href="./usuarios.php">Cancelar</a>
		</form>
	</div>
	<br>
<?php include_once "pie.php" ?>
