<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");

// Recuperar los datos del formulario
$usuario = $_POST['usuario'];
$usuario = cambiarString($usuario);
$contrasena = $_POST['contrasena'];
$contrasena = cambiarString($contrasena);

// Encriptar la contraseña
$contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

$query = "SELECT * FROM usuario where id = 1";
$resultado = mysqli_query($conn, $query);
while ($row = $resultado->fetch_assoc()) {
    $user = $row;
}

if (!empty($user)) {
    $query = "UPDATE `usuario` SET `usuario` = '$usuario',`contraseña` = '$contrasenaEncriptada' WHERE `usuario`.`id` = $id";
    mysqli_query($conn, $query);
} else {
    $query = "INSERT INTO `usuario` (`id`, `usuario`, `contraseña`) VALUES (1, '$usuario', '$contrasenaEncriptada')";
}

header('Location: ../admin.php');
?>
