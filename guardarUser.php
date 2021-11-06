<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["nombre"]) || 
	!isset($_POST["email"]) || 
	!isset($_POST["usuario"]) || 
	!isset($_POST["password"]) || 
	!isset($_POST["uid"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["uid"];
$nombre = $_POST["nombre"];
$correo = $_POST["email"];
$usuario = $_POST["usuario"];
$password = $_POST["password"];

$sentencia = $base_de_datos->prepare("UPDATE users SET name = ?, email = ?, username = ?, password = ? WHERE uid = ?;");
$resultado = $sentencia->execute([$nombre, $correo, $usuario, $password, $id]);

if($resultado === TRUE){
	echo "<script>if(confirm('Usuario actualizado correctamente')){
	document.location='usuarios.php';}
	</script>"; 
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del usuario";
?>