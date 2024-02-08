<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$nombre = cambiarString($nombre);
$descripcion = $_POST['descripcion'];
$descripcion = cambiarString($descripcion);
$link = $_POST['link'];
$maps = $_POST['maps'];
$zonaSelect = $_POST['zonaSelect'];
$nuevaZona = $_POST['nuevaZona'];
$nuevaZona = cambiarString($nuevaZona);

// Si se ingresó una nueva zona, insertarla y usar su ID
if (!empty($nuevaZona)) {
    $query = "INSERT INTO `zonas` (`id`, `zona`) VALUES (NULL, '$nuevaZona')";
    mysqli_query($conn, $query);
    $zonaSelect = mysqli_insert_id($conn);
}

// Insertar los datos en la tabla de sucursales
$query = "UPDATE `sucursales` SET `sucursal` = '$nombre', `descripcion` = '$descripcion', `link` = '$link', `maps` = '$maps', `idZona` = '$zonaSelect' WHERE `sucursales`.`id` = $id";
mysqli_query($conn, $query);
header('Location: ../admin.php');

?>
