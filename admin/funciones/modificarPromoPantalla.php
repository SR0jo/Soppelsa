<?php
// Conexión a la base de datos
include("../conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id = $_POST["id"];
    $imagen = $_FILES['imagen']['name'];
    $precio = $_POST['precio'];
    $orientacion = isset($_POST["orientacion"]) ? 1 : 0; 

    if (isset($_FILES['imagen']) && $_FILES['imagen']["name"] != "") {
        // Subir el archivo de imagen
        $target_dir = "../../Imagenes pantalla/";
        $target_file = $target_dir . basename($imagen);
        move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

        // Preparar la consulta SQL
        $sql = "UPDATE `promospantalla` SET `imagen` = 'Imagenes pantalla/$imagen', `precio` = $precio WHERE `promospantalla`.`id` = $id";
    } else {
        echo "sin imagen";
        $sql = "UPDATE `promospantalla` SET `precio` = $precio,`orientacion` = $orientacion  WHERE `promospantalla`.`id` = $id";
    }
    if ($conn->query($sql) === TRUE) {
        echo "Producto creado con éxito.";
    }

    header('Location: ../admin.php');
}
