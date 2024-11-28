<?php
ob_start();
include("../conexion.php");
include("subirImagen.php");
echo $_POST['telefono'];
// Directorio donde se guardarán las imágenes
$target_dir = "Imagenes generales/";

// Variables para almacenar los valores a insertar
$columns = [];
$values = [];

// Procesar la imagen principal si no está vacía
if (!empty($_FILES["imagenPrincipal"]["name"])) {
    $imagenPrincipal = uploadImage($_FILES["imagenPrincipal"], $target_dir);
    $columns[] = "imagen_principal";
    $values[] = "'$imagenPrincipal'";
}

// Procesar el logo si no está vacío
if (!empty($_FILES["logo"]["name"])) {
    $logo = uploadImage($_FILES["logo"], $target_dir);
    $columns[] = "logo";
    $values[] = "'$logo'";
}

// Procesar el archivo de tipografía si no está vacío
if (!empty($_FILES["tipografia"]["name"])) {
    $tipografia =  "../../Fuente.ttf";
    move_uploaded_file($_FILES["tipografia"]["tmp_name"], $tipografia);
}

// Obtener el número de teléfono si no está vacío
if (!empty($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
    $columns[] = "telefono";
    $values[] = "'$telefono'";
}

// Solo insertar si hay al menos un valor a insertar
if (!empty($columns) && !empty($values)) {
    $columns_str = implode(", ", $columns);
    $values_str = implode(", ", $values);
    $sql = "INSERT INTO general ($columns_str) VALUES ($values_str)";

    if ($conn->query($sql) === TRUE) {
        $sql = "DELETE FROM general
        WHERE id <> (SELECT MAX(id) FROM general)";
        $conn->query($sql);
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No hay datos para insertar.";
}

$conn->close();
header('Location: ../admin.php');
