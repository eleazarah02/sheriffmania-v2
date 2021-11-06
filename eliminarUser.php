<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM users WHERE uid = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	echo "<script>if(confirm('Cuenta eliminada correctamente')){
	document.location='usuarios.php';}
	</script>"; 
	exit;
}
else echo "Algo salió mal, no se elimino el usuario";
?>