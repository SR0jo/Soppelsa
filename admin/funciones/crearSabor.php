<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
// Suponiendo que ya tienes una conexión a la base de datos establecida en $conn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los valores del formulario
    $nombreProducto = $_POST['nombreSabor'];
    $nombreProducto = cambiarString($nombreProducto);
    $categoria = $_POST['categoriaSelect'];
    $descripcion = $_POST['descripcion'];
    $descripcion = cambiarString($descripcion);
    $destacar = isset($_POST['destacar']) ? 1 : 0;
    $color = $_POST['color'];

    // Tratar la imagen del producto
$imagenSabor = $_FILES['imagenSabor']['name'];
$ruta_temporal = $_FILES['imagenSabor']['tmp_name'];
$carpeta_destino = '../../Imagenes sabores/';
$ruta_real = "/Imagenes sabores/".$imagenSabor;
$ruta_real = cambiarString($ruta_real);

// Mover el archivo subido a la carpeta de destino
if (move_uploaded_file($ruta_temporal, $carpeta_destino.$imagenSabor)) {
    echo "Archivo subido con éxito.";
} else {
    echo "Fallo al subir el archivo.";
}
    $sql = "INSERT INTO `sabores` (`id`, `nombre`, `imagen`, `descripcion`, `color`, `idCategoria`, `destacado`) VALUES (NULL, '$nombreProducto', '$ruta_real', '$descripcion','$color' , '$categoria', '$destacar')";
    if ($conn->query($sql) === TRUE) {
        //echo "Registro actualizado con éxito";
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// No olvides cerrar la conexión a la base de datos cuando ya no la necesites
mysqli_close($conn);
header('Location: ../admin.php');
?>
