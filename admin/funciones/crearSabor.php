<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
include("subirImagen.php");
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
    $imagenSabor = uploadImage($_FILES['imagenSabor'],"Imagenes sabores/");
    $sql = "INSERT INTO `sabores` (`id`, `nombre`, `imagen`, `descripcion`, `color`, `destacado`) VALUES (NULL, '$nombreProducto', '$imagenSabor', '$descripcion','$color' , '$destacar')";
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
