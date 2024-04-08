<?php
include("../conexion.php");

// Recogida de datos del formulario
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$precio = str_replace(",", ".", $precio);
$destacar = isset($_POST['destacar']) ? 1 : 0;
$helado = isset($_POST['helado']) ? 1 : 0;
$cafeteria = isset($_POST['cafeteria']) ? 1 : 0;
$promo = isset($_POST['promo']) ? 1 : 0;
$imagen = $_FILES["imagen"]["name"];
// Subida de la imagen
$target_dir = "../../Imagenes carta/";
$target_file = $target_dir . basename($_FILES["imagen"]["name"]);
move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

// Inserción en la base de datos
$sql = "INSERT INTO productoscarta (titulo, descripcion, imagen, precio, destacado, helados, cafeteria, promos) VALUES ('$titulo', '$descripcion', 'Imagenes carta/$imagen', $precio, $destacar, $helado, $cafeteria, $promo)";

if ($conn->query($sql) === TRUE) {
    $query = "SELECT MAX(id) AS max_id FROM productos";
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
            $sql = "INSERT INTO `productosporsucursal` (`id`, `idSucursal`, `idProductoCarta`) VALUES (NULL, '{$sucursal["id"]}', '$max_id')";
            if ($conn->query($sql) === TRUE) 
            echo "hecho";
        }
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: ../admin.php');
