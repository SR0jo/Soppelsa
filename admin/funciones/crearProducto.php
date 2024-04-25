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
    $imagenProducto = $_FILES['imagenProducto']['name'];
    $ruta_temporal = $_FILES['imagenProducto']['tmp_name'];
    $carpeta_destino = '../../Imagenes productos/';
    $ruta_real = "/Imagenes productos/" . $imagenProducto;
    $ruta_real = cambiarString($ruta_real);

    // Mover el archivo subido a la carpeta de destino
    if (move_uploaded_file($ruta_temporal, $carpeta_destino . $imagenProducto)) {
        echo "Archivo subido con éxito.";
    } else {
        echo "Fallo al subir el archivo.";
    }
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
    $sql = "INSERT INTO `productos` (`id`, `nombre`, `imagen`, `descripcion`, `destacado`, `color`,`precio`,`precioPY`,`codigo`) VALUES (NULL, '$nombreProducto', '$ruta_real', '$descripcion', '$destacar', '$color', '$precio', '$precioPY', '$codigo')";
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
            $imagenProducto = $_FILES['imagenProductoPantalla']['name'];
            $productoGeneral = isset($_POST['productoGeneral']) ? 1 : 0;

            // Subir el archivo de imagen
            $target_dir = "../../Imagenes pantalla/";
            $target_file = $target_dir . basename($imagenProducto);
            move_uploaded_file($_FILES["imagenProductoPantalla"]["tmp_name"], $target_file);

            // Preparar la consulta SQL
            $sql = "INSERT INTO productospantalla ( imagen, productoGeneral, idProducto) VALUES ( 'Imagenes pantalla/ $imagenProducto', $productoGeneral, $max_id)";
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
            $sql = "INSERT INTO productoscarta ( imagen, destacado, helados, cafeteria, promos, idProducto) VALUES ( 'Imagenes carta/$imagen', $destacar, $helado, $cafeteria, $promo, $max_id)";

            if ($conn->query($sql) === TRUE) {
                $query = "SELECT MAX(id) AS max_id FROM productoscarta";
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
        }
        
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// No olvides cerrar la conexión a la base de datos cuando ya no la necesites
mysqli_close($conn);
header('Location: ../admin.php');
