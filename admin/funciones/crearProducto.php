<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
// Suponiendo que ya tienes una conexión a la base de datos establecida en $conn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los valores del formulario
    $nombreProducto = $_POST['nombreProducto'];
    $nombreProducto = cambiarString($nombreProducto);
    $i = 0;
    $categorias = array();

    while(true){
        if (isset($_POST['categoria' . $i])) {
            array_push($categorias, $_POST['categoria' . $i]);
            $i++;
        }else
            break;
    }
    $descripcion = $_POST['descripcion'];
    $descripcion = cambiarString($descripcion);
    $destacar = isset($_POST['destacar']) ? 1 : 0;
    $color = $_POST['color'];
    $pantalla = isset($_POST['pantallas']) ? 1 : 0;

    // Tratar la imagen del producto
$imagenProducto = $_FILES['imagenProducto']['name'];
$ruta_temporal = $_FILES['imagenProducto']['tmp_name'];
$carpeta_destino = '../../Imagenes productos/';
$ruta_real = "/Imagenes productos/".$imagenProducto;
$ruta_real = cambiarString($ruta_real);

// Mover el archivo subido a la carpeta de destino
if (move_uploaded_file($ruta_temporal, $carpeta_destino.$imagenProducto)) {
    echo "Archivo subido con éxito.";
} else {
    echo "Fallo al subir el archivo.";
}
    $sql = "INSERT INTO `productos` (`id`, `nombre`, `imagen`, `descripcion`, `destacado`, `color`) VALUES (NULL, '$nombreProducto', '$ruta_real', '$descripcion', '$destacar', '$color')";
    if ($conn->query($sql) === TRUE) {
        //echo "Registro actualizado con éxito";
        $query = "SELECT MAX(id) AS max_id FROM productos";
        $resultado = mysqli_query($conn, $query);
        
        if ($resultado) {
            $fila = mysqli_fetch_assoc($resultado);
            $max_id = $fila['max_id'];
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        foreach ($categorias as $categoria){
            $sql = "INSERT INTO `categoriasiproductos` (`id`, `idCategoria`, `idProducto`) VALUES (NULL, '$categoria', '$max_id')";
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
