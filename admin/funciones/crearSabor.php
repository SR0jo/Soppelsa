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
    $descripcion = $_POST['descripcion'];
    $descripcion = cambiarString($descripcion);
    $destacar = isset($_POST['destacar']) ? 1 : 0;
    $color = $_POST['color'];
    $i = 0;
    $categorias = array();
    while (true) {
        if (isset($_POST['categoria' . $i])) {
            array_push($categorias, $_POST['categoria' . $i]);
            $i++;
        } else
            break;
    }

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
    $sql = "INSERT INTO `sabores` (`id`, `nombre`, `imagen`, `descripcion`, `color`, `destacado`) VALUES (NULL, '$nombreProducto', '$ruta_real', '$descripcion','$color' , '$destacar')";
    if ($conn->query($sql) === TRUE) {
        //echo "Registro actualizado con éxito";
        $query = "SELECT MAX(id) AS max_id FROM sabores";
        $resultado = mysqli_query($conn, $query);

        if ($resultado) {
            $fila = mysqli_fetch_assoc($resultado);
            $max_id = $fila['max_id'];
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        foreach ($categorias as $categoria) {
            $sql = "INSERT INTO `categoriasisabores` (`id`, `idCategoria`, `idSabor`) VALUES (NULL, '$categoria', '$max_id')";
            $conn->query($sql);
        }
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// No olvides cerrar la conexión a la base de datos cuando ya no la necesites
mysqli_close($conn);
header('Location: ../admin.php');
?>
