<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
// Recuperar los datos del formulario
$nombre = $_POST['nombreProducto'];
$nombre = cambiarString($nombre);
$id = $_POST['id'];

$query = "UPDATE `categorias_productos` SET `nombre` = '$nombre' WHERE `categorias_productos`.`id` = $id";
mysqli_query($conn, $query);
header('Location: ../admin.php');
?>