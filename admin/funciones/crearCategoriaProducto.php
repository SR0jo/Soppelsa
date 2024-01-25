<?php
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$nombre = cambiarString($nombre);

$query = "INSERT INTO `categorias_productos` (`id`, `nombre`) VALUES (NULL, '$nombre')";
mysqli_query($conn, $query);
header('Location: ../admin.php');
?>