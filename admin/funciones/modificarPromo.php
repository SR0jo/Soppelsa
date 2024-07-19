<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");

// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$id = $_POST['id'];
$nombre = cambiarString($nombre);
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$descripcion = cambiarString($descripcion);
$carta = isset($_POST['agregarPromoCarta']) ? 1 : 0;
$fondo = isset($_POST['fondo']) ? 1 : 0;
$color = $_POST['color'];
if ($fondo == 0)
    $color = "";

// Procesar la imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']["name"] != "") {
    $imagen = $_FILES['imagen']['name'];
    $target_dir = "../../Imagenes promos/"; // Cambia esto a la ruta de tu directorio
    $target_file = $target_dir . basename($imagen);

    // Mover la imagen al directorio
    move_uploaded_file($_FILES['imagen']['tmp_name'], $target_file);
    $ruta_real = "/Imagenes promos/" . $imagen;
    $ruta_real = cambiarString($ruta_real);
    $sql = "UPDATE `promos` SET `titulo`='$nombre', `imagen`='$ruta_real', `descripcion`='$descripcion', `fondo`='$fondo', `color`='$color' WHERE `id` = '$id'";
} else {
    $sql = "UPDATE `promos` SET `titulo`='$nombre', `descripcion`='$descripcion', `fondo`='$fondo', `color`='$color' WHERE `id` = '$id'";
}

if ($conn->query($sql) === TRUE) {

    if ($carta == 1) {
        // Recogida de datos del formulario
        $destacar = isset($_POST['destacarCarta']) ? 1 : 0;
        if (isset($_FILES['imagen']) && $_FILES['imagen']["name"] != "") {
            $imagen = $_FILES["imagenCarta"]["name"];
            // Subida de la imagen
            $target_dir = "../../Imagenes carta/";
            $target_file = $target_dir . basename($_FILES["imagenCarta"]["name"]);
            move_uploaded_file($_FILES["imagenCarta"]["tmp_name"], $target_file);

            // Inserción en la base de datos
            $sql = "UPDATE promoscarta SET imagen = 'Imagenes carta/$imagen' , destacado = $destacar, precio = $precio WHERE idPromo = $id;";
        } else {
            $sql = "UPDATE promoscarta SET destacado = $destacar, precio = $precio WHERE idPromo = $id;";
        }

        if ($conn->query($sql) === TRUE) {
            $query = "DELETE FROM promosporsucursal WHERE idPromoCarta = $id";
            $resultado = mysqli_query($conn, $query);

            $query = "SELECT * FROM sucursales";
            $resultado = mysqli_query($conn, $query);
            $sucursales = array();
            while ($row = $resultado->fetch_assoc()) {
                $sucursales[] = $row;
            }
            foreach ($sucursales as $sucursal) {
                if (isset($_POST[$sucursal["id"]])) {
                    $sql = "INSERT INTO `promosporsucursal` (`id`, `idSucursal`, `idPromoCarta`) VALUES (NULL, '{$sucursal["id"]}', '$id')";
                    if ($conn->query($sql) === TRUE)
                        echo "hecho";
                }
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
header('Location: ../admin.php');
