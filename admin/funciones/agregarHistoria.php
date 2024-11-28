<?php
include("proteger.php");
include("../conexion.php");
include("subirImagen.php");

// Directorio donde se guardarán las imágenes
$target_dir = "Imagenes historia/";

// Procesar la imagen
$imagen = uploadImage($_FILES["imagen"], $target_dir);

// Obtener los demás datos del formulario
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO historia (titulo, imagen, descripcion) VALUES ('$titulo', '$imagen', '$descripcion')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
