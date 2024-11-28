<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
include("../funcionesBD.php");
// Recuperar los datos del formulario
$id = $_POST["id"];
$nombre = $_POST['nombre'];
$nombre = cambiarString($nombre);
$descripcion = $_POST['descripcion'];
$descripcion = cambiarString($descripcion);
$link = $_POST['link'];
$maps = $_POST['maps'];
$zonaSelect = $_POST['zonaSelect'];
$nuevaZona = $_POST['nuevaZona'];
$nuevaZona = cambiarString($nuevaZona);
$telefono = $_POST['telefono'];

// Si se ingresó una nueva zona, insertarla y usar su ID
if (!empty($nuevaZona)) {
    $query = "INSERT INTO `zonas` (`id`, `zona`) VALUES (NULL, '$nuevaZona')";
    mysqli_query($conn, $query);
    $zonaSelect = mysqli_insert_id($conn);
}
if(isset($_POST["imagen"]) && $_POST["imagen"]["name"] != ""){
    $imagen = uploadImage($_POST["imagen"], "Imagenes sucursales/");
    // Insertar los datos en la tabla de sucursales
$query = "UPDATE `sucursales` SET `sucursal` = '$nombre', `descripcion` = '$descripcion', `imagen` = '$imagen', `telefono` = '$telefono', `link` = '$link', `maps` = '$maps', `idZona` = '$zonaSelect' WHERE `sucursales`.`id` = $id";
}
// Insertar los datos en la tabla de sucursales
$query = "UPDATE `sucursales` SET `sucursal` = '$nombre', `descripcion` = '$descripcion', `telefono` = '$telefono', `link` = '$link', `maps` = '$maps', `idZona` = '$zonaSelect' WHERE `sucursales`.`id` = $id";
mysqli_query($conn, $query);
header('Location: ../admin.php');

?>
