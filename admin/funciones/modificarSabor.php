<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
// Suponiendo que ya tienes una conexión a la base de datos establecida en $conn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    // Recoger los valores del formulario
    $nombreSabor = $_POST['nombreSabor'];
    $nombreSabor = cambiarString($nombreSabor);
    $i = 0;
    $sql = "DELETE FROM categoriasisabores where idSabor = $id";
    $conn->query($sql);
    
    $categorias = array();
    while (true) {
        if (isset($_POST['categoria' . $i])) {
            if (isset($_POST['eliminar' . $i]) ? 1 : 0 == 0) {
                array_push($categorias, $_POST['categoria' . $i]);
            }
            $i++;
        } else {
            break;
        }
    }
    $descripcion = $_POST['descripcion'];
    $descripcion = cambiarString($descripcion);
    $destacar = isset($_POST['destacar']) ? 1 : 0;
    echo $destacar;
    $color = $_POST['color'];
    // Tratar la imagen del producto
    if (isset($_FILES['imagenSabor']) && $_FILES['imagenSabor']["name"] != "") {
        $imagenSabor = $_FILES['imagenSabor']['name'];
        $ruta_temporal = $_FILES['imagenSabor']['tmp_name'];
        $carpeta_destino = '../../Imagenes sabores/';
        $ruta_real = "/Imagenes sabores/" . $imagenSabor;
        $ruta_real = cambiarString($ruta_real);

        // Mover el archivo subido a la carpeta de destino
        if (move_uploaded_file($ruta_temporal, $carpeta_destino . $imagenSabor)) {
            $sql = "UPDATE `sabores` SET `nombre` = '$nombreSabor', `imagen` = '$ruta_real', `descripcion` = '$descripcion', `destacado` = '$destacar', `color` = '$color' WHERE `sabores`.`id` = $id";
        } 
    }else {
        $sql = "UPDATE `sabores` SET `nombre` = '$nombreSabor', `descripcion` = '$descripcion', `destacado` = $destacar, `color` = '$color' WHERE `sabores`.`id` = $id";
    }
    if ($conn->query($sql) === TRUE) {
        foreach ($categorias as $categoria) {
            $sql = "INSERT INTO `categoriasisabores` (`id`, `idCategoria`, `idSabor`) VALUES (NULL, '$categoria', '$id')";
            $conn->query($sql);
        }
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// No olvides cerrar la conexión a la base de datos cuando ya no la necesites
mysqli_close($conn);
header('Location: ../admin.php');
?>
