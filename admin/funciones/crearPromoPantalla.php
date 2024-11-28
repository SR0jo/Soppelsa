<?php
// Conexión a la base de datos
include("../conexion.php");
include("subirImagen.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $imagen = uploadImage($_FILES['imagen'],"Imagenes pantalla/");
    $precio = $_POST['precio'];
    $orientacion = isset($_POST["orientacion"]) == "horizontal" ? 1 : 0; 

    // Preparar la consulta SQL
    $sql = "INSERT INTO promosPantalla (imagen, precio, orientacion) VALUES ( '$imagen', $precio, $orientacion)";
    if ($conn->query($sql) === TRUE) {
        echo "Producto creado con éxito.";
    }

    header('Location: ../admin.php');
}
