<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
include("subirImagen.php");

// Recuperar los datos del formulario
$nombre = $_POST['nombre'];
$nombre = cambiarString($nombre);
$descripcion = $_POST['descripcion'];
$descripcion = cambiarString($descripcion);
$fondo = isset($_POST['fondo']) ? 1 : 0;
$color = $_POST['color'];
$carta = isset($_POST['agregarPromoCarta']) ? 1 : 0;

// Procesar la imagen
$imagen = uploadImage($_FILES['imagen'],"Imagenes promos/");

// Insertar los datos en la tabla de promociones
$sql = "INSERT INTO `promos` (`id`, `titulo`, `imagen`, `descripcion`, `fondo`, `color`) VALUES (NULL, '$nombre', '$imagen', '$descripcion', '$fondo', '$color')";
if ($conn->query($sql) === TRUE) {
    $query = "SELECT MAX(id) AS max_id FROM promos";
    $resultado = mysqli_query($conn, $query);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $max_id = $fila['max_id'];
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    if ($carta == 1) {
        // Recogida de datos del formulario
        $destacar = isset($_POST['destacarCarta']) ? 1 : 0;
        $imagen = uploadImage($_FILES['imagen'],"Imagenes carta/");
        $precio = $_POST["precio"];

        // Inserción en la base de datos
        $sql = "INSERT INTO promoscarta ( imagen, destacado,precio, idPromo) VALUES ( '$imagen', $destacar,$precio, $max_id)";

        if ($conn->query($sql) === TRUE) {
            $query = "SELECT MAX(id) AS max_id FROM promoscarta";
            $resultado = mysqli_query($conn, $query);

            if ($resultado) {
                $fila = mysqli_fetch_assoc($resultado);
                $max_id = $fila['max_id'];
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            $query = "SELECT * FROM sucursales";
            $resultado = mysqli_query($conn, $query);
            $sucursales = array();
            while ($row = $resultado->fetch_assoc()) {
                $sucursales[] = $row;
            }
            foreach ($sucursales as $sucursal) {
                if (isset($_POST[$sucursal["id"]])) {
                    $sql = "INSERT INTO `promosporsucursal` (`id`, `idSucursal`, `idPromoCarta`) VALUES (NULL, '{$sucursal["id"]}', '$max_id')";
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
