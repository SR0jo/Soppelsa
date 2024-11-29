<?php
ob_start();
include("../conexion.php");
include("subirImagen.php");
echo $_POST['telefono'];
// Directorio donde se guardarán las imágenes
$target_dir = "Imagenes generales/";

// Variables para almacenar los valores a actualizar
$updateValues = [];

// Procesar la imagen principal si no está vacía
if (!empty($_FILES["imagenPrincipal"]["name"])) {
    $imagenPrincipal = uploadImage($_FILES["imagenPrincipal"], $target_dir);
    $updateValues[] = "imagen_principal = '$imagenPrincipal'";
}

// Procesar el logo si no está vacío
if (!empty($_FILES["logo"]["name"])) {
    $logo = uploadImage($_FILES["logo"], $target_dir);
    $updateValues[] = "logo = '$logo'";
}

// Procesar el archivo de tipografía si no está vacío
if (!empty($_FILES["tipografia"]["name"])) {
    $tipografia = "../../Fuente.ttf";
    move_uploaded_file($_FILES["tipografia"]["tmp_name"], $tipografia);
}

// Obtener el número de teléfono si no está vacío
if (!empty($_POST['telefono'])) {
    $telefono = $_POST['telefono'];
    $updateValues[] = "telefono = '$telefono'";
}

// Solo actualizar si hay al menos un valor a actualizar
if (!empty($updateValues)) {
    $updateValues_str = implode(", ", $updateValues);
    
    // Obtener el ID máximo primero
    $result = $conn->query("SELECT MAX(id) as max_id FROM general");
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'];
    
    // Luego usarlo en el UPDATE
    $sql = "UPDATE general SET $updateValues_str WHERE id = $max_id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "No hay datos para actualizar.";
}

$conn->close();
header('Location: ../admin.php');
?>
