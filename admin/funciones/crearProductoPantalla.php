<?php
// Conexión a la base de datos
include("../conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombreProducto = $_POST['nombreProducto'];
    $imagenProducto = $_FILES['imagenProducto']['name'];
    $productoGeneral = isset($_POST['productoGeneral']) ? 1 : 0;
    $precio = $_POST['precio'];

    // Subir el archivo de imagen
    $target_dir = "../../Imagenes pantalla/";
    $target_file = $target_dir . basename($imagenProducto);
    move_uploaded_file($_FILES["imagenProducto"]["tmp_name"], $target_file);

    // Preparar la consulta SQL
    $sql = "INSERT INTO productospantalla (nombre, imagen, productoGeneral, precio) VALUES ('$nombreProducto', 'Imagenes pantalla/ $imagenProducto', $productoGeneral, $precio)";
    if ($conn->query($sql) === TRUE) {
        echo "Producto creado con éxito.";
    }

    header('Location: ../admin.php');
}
