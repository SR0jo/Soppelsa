<?php
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
// Recuperar los datos del formulario
$nombre = $_POST['nombreSabor'];
$id = $_POST['id'];
$nombre = cambiarString($nombre);

$query = "UPDATE `categorias_sabores` SET `nombre` = '$nombre' WHERE `categorias_sabores`.`id` = $id";
mysqli_query($conn, $query);
header('Location: ../admin.php');
?>