<?php
include('config.php');
include('session.php');
$userDetails=$userClass->userDetails($session_uid);
$active_prroveedores="active";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Agregar Proveedor | Sheriffmania</title>
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
if(!isset($_POST["nombre"]) || !isset($_POST["dir"]) || !isset($_POST["telefono"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$nombre = $_POST["nombre"];
$direccion = $_POST["dir"];
$telefono = $_POST["telefono"];


$sentencia = $base_de_datos->prepare("INSERT INTO proveedor(nombre, direccion, telefono) VALUES (?, ?, ?);");
$resultado = $sentencia->execute([$nombre, $direccion, $telefono]);

if($resultado === TRUE){
	echo "<script>if(confirm('Proveedor agregado correctamente')){
  document.location='proveedores.php';}
  </script>"; 
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>