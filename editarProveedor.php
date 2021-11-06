<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM proveedor WHERE id = ?;");
$sentencia->execute([$id]);
$proveedor = $sentencia->fetch(PDO::FETCH_OBJ);
if($proveedor === FALSE){
	echo "¡No existe algún proveedor con ese ID!";
	exit();
}
$active_proveedores="active";
?>
<?php include_once "encabezado.php" ?>
	<div class="container-fluid">
		<h1>Editar proveedor con el ID <?php echo $proveedor->id; ?></h1>
		<form method="post" action="guardarProveedor.php">
			<input type="hidden" name="id" value="<?php echo $proveedor->id; ?>">
	
			<label for="nombre">Nombre:</label>
			<input value="<?php echo $proveedor->nombre ?>" class="form-control" name="nombre" required type="text" id="nombre" placeholder="Escribe el nombre">

			<label for="dir">Direcci&oacute;n:</label>
			<input value="<?php echo $proveedor->direccion ?>" required id="dir" name="dir" type="text" class="form-control" placeholder="Direcci&oacute;n">

			<label for="telefono">Telefono:</label>
			<input value="<?php echo $proveedor->telefono ?>" class="form-control" name="telefono" required type="text" id="telefono" placeholder="Telefono" maxlength="10">
			<br><br><input class="btn btn-success" type="submit" value="Guardar cambios">
			<a class="btn btn-danger" href="./Proveedores.php">Cancelar</a>
		</form>
	</div>
	<br>
<?php include_once "pie.php" ?>
