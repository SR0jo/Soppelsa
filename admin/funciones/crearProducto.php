<?php
ob_start();
include("proteger.php");
include("../conexion.php");
include("cambiarString.php");
include("subirImagen.php");
include("../funcionesBD.php");

// Suponiendo que ya tienes una conexión a la base de datos establecida en $conn

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los valores del formulario
    $nombreProducto = $_POST['nombreProducto'];
    $nombreProducto = cambiarString($nombreProducto);
    $i = 0;
    $categorias = array();
    while (true) {
        if (isset($_POST['categoria' . $i])) {
            array_push($categorias, $_POST['categoria' . $i]);
            $i++;
        } else
            break;
    }
    $descripcion = $_POST['descripcion'];
    $descripcion = cambiarString($descripcion);
    $destacar = isset($_POST['destacar']) ? 1 : 0;
    $color = $_POST['color'];
    $pantalla = isset($_POST['agregarProductoPantalla']) ? 1 : 0;
    $carta = isset($_POST['agregarProductoCarta']) ? 1 : 0;

    // Tratar la imagen del producto
    $imagenProducto = uploadImage($_FILES['imagenProducto'], "Imagenes productos/");
    if ($carta == 1 || $pantalla == 1) {
        $precio = $_POST['precio'];
        $precio = str_replace(",", ".", $precio);
        $precioPY = $_POST['precioPY'];
        $precioPY = str_replace(",", ".", $precioPY);
        $codigo = $_POST['codigo'];
        $codigo = str_replace(",", ".", $codigo);
    } else {
        $precio = 0;
        $precioPY = 0;
        $codigo = 0;
    }
    $sql = "INSERT INTO `productos` (`id`, `nombre`, `imagen`, `descripcion`, `destacado`, `color`,`precio`,`precioPY`,`codigo`) VALUES (NULL, '$nombreProducto', '$imagenProducto', '$descripcion', '$destacar', '$color', '$precio', '$precioPY', '$codigo')";
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
        foreach ($categorias as $categoria) {
            $sql = "INSERT INTO `categoriasiproductos` (`id`, `idCategoria`, `idProducto`) VALUES (NULL, '$categoria', '$max_id')";
            $conn->query($sql);
        }
        if ($pantalla == 1) {
            // Recuperar los datos del formulario
            $imagenProducto = uploadImage($_FILES['imagenProductoPantalla'],"Imagenes pantalla/");
            $productoGeneral = isset($_POST['productoGeneral']) ? 1 : 0;

            // Preparar la consulta SQL
            $sql = "INSERT INTO productospantalla ( imagen, productoGeneral, idProducto) VALUES ( '$imagenProducto', $productoGeneral, $max_id)";
            if ($conn->query($sql) === TRUE) {
                echo "Producto creado con éxito.";
            }
        }
        if ($carta == 1) {
            // Recogida de datos del formulario
            $destacar = isset($_POST['destacarCarta']) ? 1 : 0;
            $helado = isset($_POST['helado']) ? 1 : 0;
            $cafeteria = isset($_POST['cafeteria']) ? 1 : 0;
            $imagenCarta = uploadImage($_FILES["imagenProductoCarta"], "Imagenes carta/");


            // Inserción en la base de datos
            $sql = "INSERT INTO productoscarta ( imagen, destacado, helados, cafeteria, promos, idProducto) VALUES ( '$imagenCarta', $destacar, $helado, $cafeteria, $promo, $max_id)";

            if ($conn->query($sql) === TRUE) {
                $query = "SELECT MAX(id) AS max_id FROM productoscarta";
                $resultado = mysqli_query($conn, $query);

                if ($resultado) {
                    $fila = mysqli_fetch_assoc($resultado);
                    $max_id = $fila['max_id'];
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                $sucursales = findAll("sucursales");
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
        }
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
mysqli_close($conn);
header('Location: ../admin.php');
