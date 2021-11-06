<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["nombre"]) || 
	!isset($_POST["dir"]) || 
	!isset($_POST["telefono"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$direccion = $_POST["dir"];
$telefono = $_POST["telefono"];

$sentencia = $base_de_datos->prepare("UPDATE proveedor SET nombre = ?, direccion = ?, telefono = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $direccion, $telefono, $id]);

if($resultado === TRUE){
	echo "<script>if(confirm('Proveedor actualizado correctamente')){
	document.location='proveedores.php';}
	</script>"; 
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del proveedor";
?>