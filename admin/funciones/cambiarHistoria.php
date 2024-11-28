<?php
include("proteger.php");
include("../conexion.php");
include("subirImagen.php");

// Directorio donde se guardarán las imágenes
$target_dir = "uploads/";

// Obtener el ID del registro a modificar
$id = $_POST['id'];

// Preparar la consulta SQL para la actualización
$sql = "UPDATE historia SET titulo = ?, descripcion = ?";

// Verificar si hay una nueva imagen
if (!empty($_FILES["imagen"]["name"])) {
    $imagen = uploadImage($_FILES["imagen"], $target_dir);
    $sql .= ", imagen = ?";
}

// Agregar la cláusula WHERE para el ID
$sql .= " WHERE id = ?";

// Preparar la sentencia
$stmt = $conn->prepare($sql);

// Vincular parámetros y ejecutar la sentencia
if (!empty($_FILES["imagen"]["name"])) {
    $stmt->bind_param("sssi", $_POST['titulo'], $_POST['descripcion'], $imagen, $id);
} else {
    $stmt->bind_param("ssi", $_POST['titulo'], $_POST['descripcion'], $id);
}

if ($stmt->execute()) {
    echo "Registro actualizado exitosamente";
} else {
    echo "Error al actualizar el registro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
