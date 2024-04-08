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
    if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']["name"] != "") {
        $target_dir = "../../Imagenes pantalla/";
        $target_file = $target_dir . basename($imagenProducto);
        move_uploaded_file($_FILES["imagenProducto"]["tmp_name"], $target_file);
        $sql = "UPDATE productosPantalla SET nombre = '$nombreProducto', imagen = 'Imagenes pantalla/ $imagenProducto', producto_general = $productoGeneral, precio = $precio WHERE id = $id";
    } else {
        // Preparar la consulta SQL
        $sql = "UPDATE productosPantalla SET nombre = '$nombreProducto', producto_general = $productoGeneral, precio = $precio WHERE id = $id";
    }
    if ($conn->query($sql) === TRUE) {
        echo "Producto creado con éxito.";
    }

    header('Location: ../admin.php');
}
