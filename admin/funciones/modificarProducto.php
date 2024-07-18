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
    $pantalla = isset($_POST['agregarProductoPantalla']) ? 1 : 0;
    $carta = isset($_POST['agregarProductoCarta']) ? 1 : 0;
    $i = 0;
    $sql = "DELETE FROM categoriasiproductos where idProducto = $id";
    $conn->query($sql);
    $sql = "DELETE FROM productospantalla where idProducto = $id";
    $conn->query($sql);
    $sql = "DELETE FROM productoscarta where idProducto = $id";
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
    // Tratar la imagen del producto
    if (isset($_FILES['imagenProducto']) && $_FILES['imagenProducto']["name"] != "") {
        $imagenProducto = $_FILES['imagenProducto']['name'];
        $ruta_temporal = $_FILES['imagenProducto']['tmp_name'];
        $carpeta_destino = '../../Imagenes productos/';
        $ruta_real = "/Imagenes productos/" . $imagenProducto;
        $ruta_real = cambiarString($ruta_real);
        // Mover el archivo subido a la carpeta de destino
        if (move_uploaded_file($ruta_temporal, $carpeta_destino . $imagenProducto)) {
            $sql = "UPDATE `productos` SET `nombre` = '$nombreProducto', `imagen` = '$ruta_real', `descripcion` = '$descripcion', `destacado` = '$destacar', `color` = '$color', `precio` = $precio, `precioPY` = $precioPY, `codigo` = $codigo  WHERE `productos`.`id` = $id";
        }
    } else {
        $sql = "UPDATE `productos` SET `nombre` = '$nombreProducto', `descripcion` = '$descripcion', `destacado` = '$destacar', `color` = '$color', `precio` = $precio, `precioPY` = $precioPY, `codigo` = $codigo WHERE `productos`.`id` = $id";
    }
    if ($conn->query($sql) === TRUE) {
        foreach ($categorias as $categoria) {
            $sql = "INSERT INTO `categoriasiproductos` (`id`, `idCategoria`, `idProducto`) VALUES (NULL, '$categoria', '$id')";
            $conn->query($sql);
        }
        if ($pantalla == 1) {
            // Recuperar los datos del formulario
            $imagenProducto = $_FILES['imagenProductoPantalla']['name'];
            $productoGeneral = isset($_POST['productoGeneral']) ? 1 : 0;

            // Subir el archivo de imagen
            $target_dir = "../../Imagenes pantalla/";
            $target_file = $target_dir . basename($imagenProducto);
            move_uploaded_file($_FILES["imagenProductoPantalla"]["tmp_name"], $target_file);

            // Preparar la consulta SQL
            $sql = "INSERT INTO productospantalla ( imagen, productoGeneral, idProducto) VALUES ( 'Imagenes pantalla/ $imagenProducto', $productoGeneral, $id)";
            if ($conn->query($sql) === TRUE) {
                echo "Producto creado con éxito.";
            }
        }
        if ($carta == 1) {
            // Recogida de datos del formulario
            $destacar = isset($_POST['destacarCarta']) ? 1 : 0;
            $helado = isset($_POST['helado']) ? 1 : 0;
            $cafeteria = isset($_POST['cafeteria']) ? 1 : 0;
            $promo = isset($_POST['promo']) ? 1 : 0;
            $imagen = $_FILES["imagenCarta"]["name"];
            // Subida de la imagen
            $target_dir = "../../Imagenes carta/";
            $target_file = $target_dir . basename($_FILES["imagenCarta"]["name"]);
            move_uploaded_file($_FILES["imagenCarta"]["tmp_name"], $target_file);

            // Inserción en la base de datos
            $sql = "INSERT INTO productoscarta ( imagen, destacado, helados, cafeteria, promos, idProducto) VALUES ( 'Imagenes carta/$imagen', $destacar, $helado, $cafeteria, $promo, $id)";

            if ($conn->query($sql) === TRUE) {
                $query = "DELETE FROM productosporsucursal WHERE idProductoCarta = $id";
                $resultado = mysqli_query($conn, $query);

                
                $query = "SELECT * FROM sucursales";
                $resultado = mysqli_query($conn, $query);
                $sucursales = array();
                while ($row = $resultado->fetch_assoc()) {
                    $sucursales[] = $row;
                }
                foreach ($sucursales as $sucursal) {
                    if (isset($_POST[$sucursal["id"]])) {
                        $sql = "INSERT INTO `productosporsucursal` (`id`, `idSucursal`, `idProductoCarta`) VALUES (NULL, '{$sucursal["id"]}', '$id')";
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
// No olvides cerrar la conexión a la base de datos cuando ya no la necesites
mysqli_close($conn);
header('Location: ../admin.php');
