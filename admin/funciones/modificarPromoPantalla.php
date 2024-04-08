<?php
// Conexión a la base de datos
include("../conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $imagen = $_FILES['imagen']['name'];
    $precio = $_POST['precio'];

    if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']["name"] != "") {
        // Subir el archivo de imagen
        $target_dir = "../../Imagenes pantalla/";
        $target_file = $target_dir . basename($imagen);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

        // Preparar la consulta SQL
        $sql = "UPDATE productosPantalla SET imagen = 'Imagenes pantalla/$imagen', precio = $precio WHERE id = $id";
    } else {
        $sql = "UPDATE productosPantalla SET precio = $precio WHERE id = $id";
    }
    if ($conn->query($sql) === TRUE) {
        echo "Producto creado con éxito.";
    }

    header('Location: ../admin.php');
}
