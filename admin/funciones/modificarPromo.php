<?php
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");

// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$id = $_POST['id'];
$nombre = cambiarString($nombre);
$descripcion = $_POST['descripcion'];
$descripcion = cambiarString($descripcion);
$fondo = isset($_POST['fondo']) ? 1 : 0;
$color = $_POST['color'];
if($fondo == 0)
$color = "";

// Procesar la imagen
if(isset($_FILES['imagen']) && $_FILES['imagen']["name"] != ""){
    $imagen = $_FILES['imagen']['name'];
    $target_dir = "../../Imagenes promos/"; // Cambia esto a la ruta de tu directorio
    $target_file = $target_dir . basename($imagen);

    // Mover la imagen al directorio
    move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);
    $ruta_real = "/Imagenes promos/".$imagen;
    $ruta_real = cambiarString($ruta_real);
    $query = "UPDATE `promos` SET `titulo`='$nombre', `imagen`='$ruta_real', `descripcion`='$descripcion', `fondo`='$fondo', `color`='$color' WHERE `id` = '$id'";

}else{
    $query = "UPDATE `promos` SET `titulo`='$nombre', `descripcion`='$descripcion', `fondo`='$fondo', `color`='$color' WHERE `id` = '$id'";
}

mysqli_query($conn, $query);
header('Location: ../admin.php');
?>
