<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
// Suponiendo que ya tienes una conexión a la base de datos establecida en $conn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    // Recoger los valores del formulario
    $nombreProducto = $_POST['nombreProducto'];
    $nombreProducto = cambiarString($nombreProducto);
    $i = 0;
    $sql = "DELETE FROM categoriasiproductos where idProducto = $id";
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
    $color = $_POST['color'];
    // Tratar la imagen del producto
    if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']["name"] != "") {
        $imagenProducto = $_FILES['imagenProducto']['name'];
        $ruta_temporal = $_FILES['imagenProducto']['tmp_name'];
        $carpeta_destino = '../../Imagenes productos/';
        $ruta_real = "/Imagenes productos/" . $imagenProducto;
        $ruta_real = cambiarString($ruta_real);
        // Mover el archivo subido a la carpeta de destino
        if (move_uploaded_file($ruta_temporal, $carpeta_destino . $imagenProducto)) {
            $sql = "UPDATE `productos` SET `nombre` = '$nombreProducto', `imagen` = '$ruta_real', `descripcion` = '$descripcion', `destacado` = '$destacar', `color` = '$color' WHERE `productos`.`id` = $id";
        } 
    }else {
        $sql = "UPDATE `productos` SET `nombre` = '$nombreProducto', `descripcion` = '$descripcion', `destacado` = '$destacar', `color` = '$color' WHERE `productos`.`id` = $id";
    }
    if ($conn->query($sql) === TRUE) {
        foreach ($categorias as $categoria) {
            $sql = "INSERT INTO `categoriasiproductos` (`id`, `idCategoria`, `idProducto`) VALUES (NULL, '$categoria', '$id')";
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
