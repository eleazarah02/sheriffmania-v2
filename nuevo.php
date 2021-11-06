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

<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["codigo"]) || !isset($_POST["descripcion"]) || !isset($_POST["precioVenta"]) || !isset($_POST["precioCompra"]) || !isset($_POST["existencia"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioVenta = $_POST["precioVenta"];
$precioCompra = $_POST["precioCompra"];
$existencia = $_POST["existencia"];

if ($precioCompra < $precioVenta) {

$sentencia = $base_de_datos->prepare("INSERT INTO productos(codigo, descripcion, precioVenta, precioCompra, existencia) VALUES (?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$codigo, $descripcion, $precioVenta, $precioCompra, $existencia]);

if($resultado === TRUE){
	echo "<script>if(confirm('Producto agregado correctamente')){
  document.location='listar.php';}
  </script>"; 
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
}else echo "<script>if(confirm('El precio de compra no puede ser mayor que el precio de venta')){
  document.location='agregarProducto.php';}
  </script>";

?>
<?php include_once "pie.php" ?>