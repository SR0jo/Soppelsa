<?php
// Conexión a la base de datos
include("../conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $imagen = $_FILES['imagen']['name'];
    $precio = $_POST['precio'];

    // Subir el archivo de imagen
    $target_dir = "../../Imagenes pantalla/";
    $target_file = $target_dir . basename($imagen);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

    // Preparar la consulta SQL
    $sql = "INSERT INTO promosPantalla (imagen, precio) VALUES ( 'Imagenes pantalla/ $imagen', $precio)";
    if ($conn->query($sql) === TRUE) {
        echo "Producto creado con éxito.";
    }

    header('Location: ../admin.php');
}
