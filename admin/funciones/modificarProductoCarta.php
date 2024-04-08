<?php
include("../conexion.php");

// Recogida de datos del formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$precio = str_replace(",", ".", $precio);
$destacar = isset($_POST['destacar']) ? 1 : 0;
$helado = isset($_POST['helado']) ? 1 : 0;
$cafeteria = isset($_POST['cafeteria']) ? 1 : 0;
$promo = isset($_POST['promo']) ? 1 : 0;


// Subida de la imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']["name"] != "") {
    $imagen = $_FILES["imagen"]["name"];
    $target_dir = "../../Imagenes carta/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
    // Inserción en la base de datos
$sql = "UPDATE productosCarta SET titulo = '$titulo', descripcion = '$descripcion', imagen = 'Imagenes carta/$imagen', precio = $precio, destacado = $destacar, helados = $helado, cafeteria = $cafeteria, promos = $promo WHERE id = $id";
}else
// Inserción en la base de datos
$sql = "UPDATE productosCarta SET titulo = '$titulo', descripcion = '$descripcion', precio = $precio, destacado = $destacar, helados = $helado, cafeteria = $cafeteria, promos = $promo WHERE id = $id";


if ($conn->query($sql) === TRUE) {
    $query = "SELECT * FROM sucursales";
    $resultado = mysqli_query($conn, $query);
    $sucursales = array();
    while ($row = $resultado->fetch_assoc()) {
        $sucursales[] = $row;
    }
    $query = "DELETE FROM productosporsucursal WHERE idProductoCarta = $id";
    mysqli_query($conn, $query);
    foreach ($sucursales as $sucursal) {
        echo $_POST[$sucursal["id"]];
        if (isset($_POST[$sucursal["id"]])) {
            echo "puto";
            $sql = "INSERT INTO `productosporsucursal` (`id`, `idSucursal`, `idProductoCarta`) VALUES (NULL, '{$sucursal["id"]}', '$id')";
            if ($conn->query($sql) === TRUE) 
            echo "hecho";
        }
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: ../admin.php');
