<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) || 
	!isset($_POST["descripcion"]) || 
	!isset($_POST["precioCompra"]) || 
	!isset($_POST["precioVenta"]) || 
	!isset($_POST["existencia"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioCompra = $_POST["precioCompra"];
$precioVenta = $_POST["precioVenta"];
$existencia = $_POST["existencia"];

if ($precioCompra < $precioVenta) {

$sentencia = $base_de_datos->prepare("UPDATE productos SET codigo = ?, descripcion = ?, precioCompra = ?, precioVenta = ?, existencia = ? WHERE id = ?;");
$resultado = $sentencia->execute([$codigo, $descripcion, $precioCompra, $precioVenta, $existencia, $id]);

if($resultado === TRUE){
	echo "<script>if(confirm('producto actualizado correctamente')){
	document.location='listar.php';}
	</script>"; 
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
}else echo "<script>if(confirm('El precio de compra no puede ser mayor al precio de venta')){
	document.location='listar.php';}
	</script>"; 
?>