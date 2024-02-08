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
$fondo = isset($_POST['fondo']) ? 1 : 0;
$color = $_POST['color'];

// Procesar la imagen
$imagen = $_FILES['imagen']['name'];
$target_dir = "../../Imagenes promos/"; // Cambia esto a la ruta de tu directorio
$target_file = $target_dir . basename($imagen);

// Mover la imagen al directorio
move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);
$ruta_real = "/Imagenes promos/".$imagen;
$ruta_real = cambiarString($ruta_real);

// Insertar los datos en la tabla de promociones
$query = "INSERT INTO `promos` (`id`, `titulo`, `imagen`, `descripcion`, `fondo`, `color`) VALUES (NULL, '$nombre', '$ruta_real', '$descripcion', '$fondo', '$color')";
mysqli_query($conn, $query);
header('Location: ../admin.php');
?>
